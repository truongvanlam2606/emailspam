<template>
    <div class="panel fill-blanks-order astr grid text-center">
         <div class="panel-stuff">
            <div class="panel-question w-full lg:w-8/12 text-center mx-auto">
                <h2 class="block text-2xl md:text-4xl leading-tight font-bold">{{ question.name }}</h2>
            </div>
            <span v-for="(part, index) in sentenceParts" :key="index">
                <input
                    v-if="part.input"
                    v-model="part.guess"
                    :aria-colindex="index"
                    :class="[{ correct: examType == 'PUBLIC_RESULTS' && partIsCorrect(part)}, 'fill-val'+index]"
                />
                <span v-else>{{ part.text }}</span>
            </span>
            <!-- <p v-if="allCorrect">All done!</p> -->
         </div>
    </div>
</template>

<script>
export default {
    name: "CFillBlank",
    props: {
        question: {
            default: () => ({
                id: "1",
                name: "Fill blank.",
                type: "fill_blank",
                score: 1,
                prompt: "adad",
                data_raw: {
                    name: "adadd",
                    type: "fill_blank",
                    score: 1,
                    prompt: "adad",
                    correct: "This is a [test] sentence for [demonstration] purposes",
                    options:"",
                    description: null,
                    main_content: "<p>adad</p>"
                }
            })
        },
        number: {
            default: 1
        },
        totalCount: {
            default: 1
        },
        examType: {
            default: "PRIVATE"
        },
        choice: {
            default: null
        }
    },
    data() {
        return {
            answer: null,
            sentenceParts: []
        };
    },
    methods: {
        partIsCorrect(part) {
            return !part.input || part.text === part.guess;
        },

        reset() {
            const re = /(\[[^\]]*\])/;

            // The filter removes empty strings
            const parts = this.question.data_raw.correct.split(re).filter(text => text);

            this.sentenceParts = this.choice || parts.map(segment => {
                const isInput = re.test(segment);

                return {
                    guess: "",
                    input: isInput,
                    text: isInput ? segment.slice(1, -1) : segment
                };
            });
        },
        updateAnswer() {
            this.$emit("updateAnswer", this.sentenceParts);
        }
    },
    computed: {
        allCorrect() {
            return this.sentenceParts.every(this.partIsCorrect);
        }
    },
    watch: {
        question: {
            immediate: true,
            handler: "reset"
        },
        sentenceParts: {
            handler: function () {
                this.updateAnswer();
            },
            deep: true
        }
    },
    components: {}
};
</script>

<style scope>
.fill-blanks-order span {
    margin-bottom: 7px;
    padding-left: 4px;
    display: inline-block;
}
</style>
