<template>
    <loader v-if="loading" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular"></loader>
    <b-container v-else class="bg-white py-3">
        <b-row>
            <b-col ref="mail_host">
                <b-form-group
                    label="Mail Host:"
                    label-for="input-mail_host"
                >
                    <b-form-input
                        id="input-mail_host"
                        v-model="smtpEmail.mail_host"
                    ></b-form-input>
                </b-form-group>
            </b-col>
        </b-row>

        <b-row>
            <b-col ref="mail_port">
                <b-form-group
                    label="Mail Port:"
                    label-for="input-mail_port"
                >
                    <b-form-input
                        id="input-mail_port"
                        v-model="smtpEmail.mail_port"
                    ></b-form-input>
                </b-form-group>
            </b-col>
        </b-row>

        <b-row>
            <b-col ref="mail_username">
                <b-form-group
                    label="Mail User Name:"
                    label-for="input-mail_username"
                >
                    <b-form-input
                        id="input-mail_username"
                        v-model="smtpEmail.mail_username"
                    ></b-form-input>
                </b-form-group>
            </b-col>
        </b-row>

        <b-row>
            <b-col ref="mail_password">
                <b-form-group
                    label="Mail Password:"
                    label-for="input-mail_password"
                >
                    <b-form-input
                        id="input-mail_password"
                        v-model="smtpEmail.mail_password"
                    ></b-form-input>
                </b-form-group>
            </b-col>
        </b-row>

        <b-row>
            <b-col ref="mail_encryption">
                <b-form-group
                    label="Mail Encryption:"
                    label-for="input-mail_encryption"
                >
                    <b-form-input
                        id="input-mail_encryption"
                        v-model="smtpEmail.mail_encryption"
                    ></b-form-input>
                </b-form-group>
            </b-col>
        </b-row>

        <div class="mx-auto mt-3">
            <b-button
                :loading="loading"
                :color="yellow"
                v-if="!data.id"
                @click="addSmtpEmail"
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
                @click="updateSmtpEmail"
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
            Add SmtpEmail successfully!
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
    name: "AddSmtpEmail",
    props: {
        data: {
            type: Object,
            default: () => ({
                mail_host: "smtp.gmail.com",
                mail_port: "587",
                mail_username: "",
                mail_password: "",
                mail_encryption: "tls"
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
            smtpEmail: {
                ...this.data,
            },
            errMessage: "",
        };
    },
    methods: {
        addSmtpEmail() {
            this.isSubmitted = true;
            this.loading = true;
            const data = {
                ...this.smtpEmail,
            };
            this.$http
                .post("smtp-emails/store", data)
                .then((res) => {
                    this.isSubmitted = false;
                    // this.smtpEmails.push(res.data.smtpEmail);
                    window.scrollTo(0, 0);
                    // this.smtpEmail = null;
                    this.smtpEmail = {
                        mail_host: "smtp.gmail.com",
                        mail_port: "587",
                        mail_username: "",
                        mail_password: "",
                        mail_encryption: "tls"
                    };
                    this.$bvToast.show('my-toast');
                    window.location.href = "/admin/smtp-emails";
                })
                .catch((err) => {
                    console.log(err.response.data);
                    alert(
                        err.response.status == 403
                            ? err.response.data.message
                            : "There was an error submitting this smtpEmail, please try again."
                    );
                })
                .finally(() => {
                    this.loading = false;
                });
        },
        updateSmtpEmail() {
            this.isSubmitted = true;
            this.loading = true;
            this.$http
                .put("smtp-emails/"+this.smtpEmail.id, {
                    'mail_host': this.smtpEmail.mail_host,
                    'mail_port': this.smtpEmail.mail_port,
                    'mail_username': this.smtpEmail.mail_username,
                    'mail_password': this.smtpEmail.mail_password,
                    'mail_encryption': this.smtpEmail.mail_encryption,
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
                            : "There was an error submitting this smtpEmail, please try again."
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
        'smtpEmail_table': Table
    }
};
</script>

<style scoped>

.smtpEmails {
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
