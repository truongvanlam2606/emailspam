<template>
    <loader v-if="loading" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular"></loader>
    <b-container v-else class="bg-white py-3">
        <b-row>
            <b-col ref="name">
                <b-form-group
                    label="Name:"
                    label-for="input-name"
                >
                    <b-form-input
                        id="input-name"
                        v-model="question.name"
                    ></b-form-input>
                </b-form-group>
            </b-col>
        </b-row>
        <b-row>
            <b-col>
                <label>Content: </label>
                <!-- <quill-editor
                    class="questions mb-4"
                    :options="editorOption"
                    v-model="question.content"
                /> -->
                <b-form-textarea
                    id="textarea"
                    v-model="question.content"
                    rows="20"
                >
                </b-form-textarea>
            </b-col>
        </b-row>

        <div class="mx-auto mt-3">
            <b-button
                :loading="loading"
                :color="yellow"
                v-if="!data.id"
                @click="addQuestion"
                tile
                block
                class="col-4 mx-auto"
            >
                Save
            </b-button>
            <b-button
                :loading="loading"
                :color="yellow"
                v-else
                @click="updateQuestion"
                tile
                block
                class="col-4 mx-auto"
            >
                Update
            </b-button>
        </div>
        <b-toast id="my-toast" variant="success" solid>
            <template #toast-title>
                <div class="d-flex flex-grow-1 align-items-baseline">
                <strong class="mr-auto">Success!</strong>
                </div>
            </template>
            Add question successfully!
        </b-toast>
    </b-container>
</template>

<script>
// import katex from "katex";
// import "katex/dist/katex.min.css";
import FillBlank from './FillBlank';
import MultipleChoice from './MultipleChoice';
import SingleChoice from './SingleChoice';
import TrueFalse from './TrueFalse';
import SelectImage from './SelectImage';
import _ from 'lodash';
import Table from './Table';

export default {
    name: "AddQuestion",
    props: {
        data: {
            type: Object,
            default: () => ({
                name: "",
                content: "",
            })
        },
    },
    components: {},
    data() {
        return {
            currentQuestion: null,
            correct: _.get(this.data, 'data_raw.correct', null),
            btnLoading: false,
            dialog: false,
            loading: false,
            isSubmitted: false,
            editorDisabled: true,
            editorOption: {
                modules: {
                    toolbar: [
                        ["bold", "italic", "underline", "strike"],
                        ["blockquote"],
                        [{ header: 1 }, { header: 2 }],
                        [{ list: "ordered" }, { list: "bullet" }],
                        [{ script: "sub" }, { script: "super" }],
                        [{ indent: "-1" }, { indent: "+1" }],
                        [{ align: [] }],
                        ["clean"],
                        ["link", "image", "video"],
                        ["formula"],
                        ["showHtml"],
                        ["blockquote", "code-block"],
                    ],
                },
                placeholder: "Type text here",
                theme: "snow",
                readonly: true,
            },
            handlers: {
                showHtml: () => {
                    if (this.txtArea.style.display === "") {
                        const html = this.txtArea.value;
                    if (html === '<p><br/></p>') {
                        this.html = null;
                    } else {
                        this.html = html.replace(new RegExp('<p><br/>', 'g'), '<p>')
                    }
                        this.quill.pasteHTML(html);
                    }
                    this.txtArea.style.display =
                        this.txtArea.style.display === "none" ? "" : "none";
                    }
            },
            yellow: "#e67d23",
            black: "#343a40",
            question: {
                ...this.data,
            },
            errMessage: "",
        };
    },
    methods: {
        // onEditorBlur(quill) {
        //     // this.editorDisabled = true
        // },
        updateCorrect(val) {
            this.correct = val;
        },
        onEditorFocus(quill) {
            this.editorDisabled = false;
        },
        deleteQuestion() {
            this.btnLoading = true;
            this.$http
                .post(`deleteQuestion/${this.currentQuestion.id}`)
                .then((res) => {
                    this.btnLoading = false;
                    this.dialog = false;
                    this.questions = this.questions.filter(
                        (question) => question.id !== this.currentQuestion.id
                    );
                    this.currentQuestion = null;
                })
                .catch((err) => {
                    this.btnLoading = false;
                    this.dialog = false;
                    console.log(err.response.data);
                    alert(
                        err.response.status == 403
                            ? err.response.data.message
                            : "There was an error deleting this question, please try again."
                    );
                })
                .finally(() => {
                    this.btnLoading = false;
                    this.isSubmitted = true;
                });
        },
        addQuestion() {
            this.isSubmitted = true;
            this.loading = true;
            const data = {
                ...this.question,
            };
            this.$http
                .post("email-templates/store", data)
                .then((res) => {
                    this.isSubmitted = false;
                    // this.questions.push(res.data.question);
                    window.scrollTo(0, 0);
                    // this.question = null;
                    this.correct = null;
                    this.options = [
                        {
                            content: "",
                            is_correct: false
                        }
                    ];
                    this.question = {
                        name: "",
                        content: "",
                    };
                    this.$bvToast.show('my-toast');
                    window.location.href = "/admin/email-templates";
                })
                .catch((err) => {
                    console.log(err.response.data);
                    alert(
                        err.response.status == 403
                            ? err.response.data.message
                            : "There was an error submitting this question, please try again."
                    );
                })
                .finally(() => {
                    this.loading = false;
                });
        },
        updateQuestion() {
            this.isSubmitted = true;
            this.loading = true;
            this.$http
                .put("email-templates/"+this.question.id, {
                    'content': this.question.content,
                    'name': this.question.name,
                })
                .then((res) => {
                    this.loading = false;
                    this.isSubmitted = false;
                    window.scrollTo(0, 0);
                    this.makeToast(true, "Question updated successfully");
                })
                .catch((err) => {
                    this.loading = false;
                     this.isSubmitted = false;
                    console.log(err.response.data);
                    alert(
                        err.response.status == 403
                            ? err.response.data.message
                            : "There was an error submitting this question, please try again."
                    );
                });
        },
        formatDate(dateString) {
            const options = { year: "numeric", month: "long", day: "numeric" };
            return new Date(dateString).toLocaleDateString(undefined, options);
        },
        makeToast(append = false, title = 'Success') {
            this.$bvToast.toast(`Succes!`, {
                title: title,
                autoHideDelay: 8000,
                appendToast: append,
                variant: 'success',
            })
        },
        goto(refName) {
            var element = this.$refs[refName];
            var top = element.offsetTop;
            window.scrollTo(0, top);
        },
        callBackUploadFile(file, id) {
            this.options[id].content = {
                ...this.options[id].content,
                image: file.path,
            }
        },
        updateDataQuestion(data) {
            this.question = {
                ...this.question,
                ...data,
            }
        }
    },
    watch: {
        options(newVal, oldVal) {
            this.errMessage = "";
        },
    },
    mounted() {
        // window.katex = katex;
    },
    computed: {

    },
    components: {
        'fill_blank': FillBlank,
        'multiple_choice': MultipleChoice,
        'single_choice': SingleChoice,
        'true_false': TrueFalse,
        'select_image': SelectImage,
        'question_table': Table
    }
};
</script>

<style scoped>

.questions {
    height: 120px;
}

.active {
    background-color: #343a40;
    color: #e67d23;
    border: solid #343a40 1px;
}

.btn-secondary {
    background-color: #e67d23;
    border: solid #e67d23 1px;
}

.yellow {
    background-color: #e67d23;
}

.ql-showHtml:after {
  content: "[source]";
}
button.ql-showHtml {
  width: 100% !important;
}
</style>
