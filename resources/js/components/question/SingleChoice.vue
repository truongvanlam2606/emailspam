<template>
    <div class="mb-3 panel select-one math grid text-center">
        <div class="panel-stuff">
            <div class="panel-question w-full lg:w-8/12 text-center mx-auto">
                <h2 class="block text-2xl md:text-4xl leading-tight font-bold">{{ question.name }}</h2>
            </div>
            <p class="text-lg py-2 text-gray-700" v-html="question.data_raw.main_content"></p>
            <div class="panel-answer one-box for-checkbox-budget" v-for="(option, idx) in question.data_raw.options" :key="idx">
                <input class="d-none" type="radio" :id="question.id" :name="question.id" :value="idx">
                <label class="px-2 viewer-answer-one" v-bind:class="{ 'selected': answer == idx  }" :for="question.id" @click="updateSCAnswer(idx)" v-html="option.content"></label>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CSingleChoice",
    props: {
        question: {
            default: () => ({
                'id': '1',
                "name": "Select the four gas giants.",
                "type": "multiple_choice",
                "score": 1,
                "prompt": "adad",
                'data_raw': {
                    "name": "adadd",
                    "type": "multiple_choice",
                    "score": 1,
                    "prompt": "adad",
                    "correct": "0,1",
                    "options": [
                        {
                            "content": "<p>adad</p>",
                            "is_correct": true
                        },
                        {
                            "content": "<p>hhaaa</p>",
                            "is_correct": true
                        }
                    ],
                    "description": null,
                    "main_content": "<p>adad</p>"
                }
            })
        },
        choice: {
            default: ''
        }
    },
    data() {
        return {
            answer: this.choice || this.choice === 0 ? this.choice : null,
        };
    },
    methods: {
        updateSCAnswer(val) {
            this.answer = val;
            this.$emit("updateAnswer", this.answer);
        }
    },
    computed: {},
    watch: {},
    components: {},
};
</script>

<style></style>
