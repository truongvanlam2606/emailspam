<template>
    <div class="panel">
        <div class="panel-stuff">
            <!-- <div class="w-full lg:w-8/12">
                <h2 class="text-2xl md:text-4xl leading-tight font-bold">Question No {{number}} of {{totalCount}}</h2>
            </div> -->
            <component :examType="examType" @updateAnswer="setSelected" :is="question.type" :question="question" :choice="choice"></component>
            <!-- <v-card-text>
                <p v-html="question.question"></p>

                <v-list two-line :key="question.id">
                    <v-list-item-group v-model="selected">
                        <template v-for="(option,index) in question.options">
                            <v-list-item :key="index">
                                <template v-slot:default="{ active }">
                                    <v-list-item-action>
                                    <v-checkbox
                                        :input-value="active"
                                        color="primary"
                                    ></v-checkbox>
                                    </v-list-item-action>

                                    <v-list-item-content v-html="option.body">
                                    </v-list-item-content>
                                </template>
                            </v-list-item>
                        </template>
                    </v-list-item-group>
                </v-list>

            </v-card-text> -->

            <!-- <v-card-actions>
                <v-btn tile color="danger" :disabled="number == 1" @click="$emit('storeChoice', 'previous', newSelection, number)">
                    <v-icon small>
                        mdi-arrow-left
                    </v-icon>
                    Previous Question
                </v-btn>
                <v-spacer></v-spacer>
                <v-btn tile color="primary" outlined v-if="number !== totalCount" @click="$emit('storeChoice', 'next', newSelection, number)">
                    Next Question
                    <v-icon small>
                        mdi-arrow-right
                    </v-icon>
                </v-btn>
                <v-btn tile v-else @click="dialog = true" color="success">
                    Submit
                    <v-icon small>
                        mdi-check
                    </v-icon>
                </v-btn>
            </v-card-actions> -->

            <!-- <v-dialog v-model="dialog" :persistent="btnLoading" max-width="350">
                <v-card>
                    <v-card-title class="headline">Submit Examination?</v-card-title>
                    <v-card-text>
                    Are you sure you are ready to submit your examination?
                    Doing so would mean you will not be able to return to check your answers.
                    </v-card-text>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn :disabled="btnLoading" color="green darken-1" text @click="dialog = false">No</v-btn>
                        <v-btn :loading="btnLoading" :disabled="btnLoading" color="green darken-1" text @click="submitExam">Yes, Submit</v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog> -->
            <div class="mt-3 d-flex justify-content-between bottom">
                <div class="bg-green-300 p-2 rounded relative uppercase text-sm font-semibold text-green-800">{{question.score}} point</div>
                <div>
                    <div class="rounded border border-gray-700 hover:bg-blue-300 px-4 py-2 inline-block mx-2 cursor-pointer transition duration-500 ease-in-out" :class="{ 'd-none': number == 1}" @click="$emit('storeChoice', 'previous', newSelection, number)">Previous Question</div>
                    <div class="bg-yellow-500 hover:bg-yellow-600 rounded border border-yellow-600 shadow font-semibold px-6 py-2 inline-block transition duration-500 ease-in-out cursor-pointer text-xl" v-if="number != totalCount" @click="$emit('storeChoice', 'next', newSelection, number)">Next Question</div>
                    <div class="bg-yellow-500 hover:bg-yellow-600 rounded border border-yellow-600 shadow font-semibold px-6 py-2 inline-block transition duration-500 ease-in-out cursor-pointer text-xl" v-else @click="$emit('storeChoice', 'submit', newSelection, number)">
                        Submit
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import CFillBlank from './FillBlank';
import CMatching from './Matching';
import CMultipleChoice from './MultipleChoice';
import CSingleChoice from './SingleChoice';
import CTrueFalse from './TrueFalse';
import CSelectImage from './SelectImage';

export default {
    name: "Question",
    props: ['question', 'number', 'totalCount', 'selectedOption', 'choice'],
    data() {
        return {
            newSelection: this.selectedOption !== undefined ? this.selectedOption : null,
            dialog: false,
            yellow:  "#e67d23",
            btnLoading: false
        }
    },
    methods: {
        submitExam() {
            this.btnLoading = true;
            this.$store.dispatch('endExam')
            .then(() => {
                this.btnLoading = false;
                this.dialog = false
                window.location.href = '/success'
            })
            .catch(err => {
                this.btnLoading = false;
                this.dialog = false
                console.log(err.response.data)
                alert("Sorry, there was an error submitting your examination. Kindly contact the invigilator for assistance.")
            })
        },
        setSelected(selected) {
            this.newSelection = selected;
        }
    },
    computed: {
        selected: {
            get() {
                return this.selectedOption
            },
            set(newValue) {
                this.newSelection = newValue
                this.$store.commit('UPDATE_SELECTION', newValue)
            }

        },
        examType() {
            return this.$store.getters.examType
        }
    },
    watch: {
        'question.id'() {
            this.newSelection = this.selectedOption
        }
    },
    components: {
        "fill_blank": CFillBlank,
        "matching": CMatching,
        "multiple_choice": CMultipleChoice,
        "single_choice": CSingleChoice,
        "true_false": CTrueFalse,
        "select_image": CSelectImage
    }
}
</script>

<style>

</style>
