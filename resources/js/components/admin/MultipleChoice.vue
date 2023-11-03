<template>
    <div>
        <b-row class="mt-3">
            <b-col>
                <h3>Answers</h3>
                <p style="color: #ff5500">
                    (Note: Click the checkbox beside an option to mark it as the correct option)
                </p>
                <hr />
            </b-col>
        </b-row>
        <b-row v-for="(option,k) in options" :key="k">
            <b-col class="col-md-1">
                <b-form-checkbox size="lg" v-model="option.is_correct" title="Mark this option as correct" :value="true" class="d-flex align-items-center h-100"></b-form-checkbox>
            </b-col>
            <b-col class="col-md-9">
                <h4>Answer {{k + 1}}</h4>
                <quill-editor v-model="option.content" :options="editorOption" class="option" />
                <hr>
            </b-col>
            <b-col class="col-md-2">
                <div class="d-flex align-items-center h-100">
                    <b-button class="mr-2" v-show="k || ( !k && options.length > 1)" @click="remove(k)">
                        <i class="fas fa-minus-circle"></i>
                    </b-button>
                    <b-button v-show="k == options.length-1" @click="add(k)">
                        <i class="fas fa-plus-circle"></i>
                    </b-button>
                </div>
            </b-col>
        </b-row>
    </div>
</template>

<script>
export default {
    name: "MultipleChoice",
    props: ['options'],
    data() {
        return {
            editorOption: {
                modules: {
                    toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote'],
                    [{ 'header': 1 }, { 'header': 2 }],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    [{ 'script': 'sub' }, { 'script': 'super' }],
                    [{ 'indent': '-1' }, { 'indent': '+1' }],
                    [{ 'align': [] }],
                    ['clean'],
                    ['link', 'image', 'video'],
                    ["formula"]
                    ],
                 },
                placeholder: "Type text here",
                theme: 'snow',
                readonly: true
            },
        };
    },
    methods: {
        add () {
            this.options.push({
                content: "",
                is_correct: false
            })
        },
        remove (index) {
            this.options.splice(index, 1)
        },
    },
    watch: {
        options: {
            handler(newVal, oldVal) {
                let _correct = '';
                newVal.forEach((option, index) => {
                    if (option.is_correct) {
                        _correct += !_correct ? index : ','+index;
                    }
                });
                this.$emit("updateCorrect", _correct);
            },
            deep: true
        },
    },
    mounted() {},
    computed: {},
};
</script>
