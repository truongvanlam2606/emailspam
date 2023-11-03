<template>
    <div class="mb-3 panel true-false math grid text-center">
        <div class="panel-stuff">
            <div class="panel-question w-full lg:w-8/12 text-center mx-auto">
                <h2 class="block text-2xl md:text-4xl leading-tight font-bold">{{ question.name }}</h2>
            </div>
            <p class="text-lg py-2 text-gray-700" v-html="question.data_raw.main_content"></p>
            <div class="panel-answer true-false-box for-checkbox-budget">
                <input class="d-none" type="radio" id="0" name="0" value="0">
                <label class="px-2 viewer-answer-one" v-bind:class="{ 'selected': answer == 0  }" for="0" @click="updateAnswer(0)">False</label>
            </div>
            <div class="panel-answer true-false-box for-checkbox-budget">
                <input class="d-none" type="radio" id="1" name="1" value="1">
                <label class="px-2 viewer-answer-one" v-bind:class="{ 'selected': answer == 1  }" for="1" @click="updateAnswer(1)">True</label>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CTrueFalse",
    props: {
        question: {
            default: () => ({
                'id': '1',
                "name": "True/False.",
                "type": "true_false",
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
        updateAnswer(val) {
            this.answer = val;
            this.$emit("updateAnswer", this.answer);
        }
    },
    computed: {},
    watch: {},
    components: {},
};
</script>

<style scope>
</style>
