<template>
<div class="exam">
    <div>
        <!-- <SingleQuestion v-if="currentQuestion" :question="currentQuestion" :totalCount="questions.length" :selectedOption="selectedOption" :number="questionNumber" @storeChoice="storeChoice" v-on:updateSelection="updateSelection"/> -->
        <!-- v-else -->
        <!-- <v-card shaped outlined class="p-3">
            <v-card-title>
                {{mainsubject.subject_name.toUpperCase()}} EXAMINATION
            </v-card-title>
            <hr>

            <v-card-text>
                <h5>INSTRUCTIONS</h5>
                <hr>
                <p><v-icon small>mdi-chevron-right</v-icon> This examination will last for <strong>{{examtime}}</strong></p>
                <hr>
                <p><v-icon small>mdi-chevron-right</v-icon> Study every question carefully</p>
                <hr>
                Best of Luck!

            </v-card-text>

            <v-card-actions>
                <v-btn tile color="primary" @click="startExam">
                    <span v-if="!hasStarted">Start Exam</span>
                    <span v-else>Continue</span>
                    <v-icon small>
                        mdi-arrow-right
                    </v-icon>
                </v-btn>
            </v-card-actions>
        </v-card> -->
        <b-spinner
            v-if="loading"
        ></b-spinner>
        <div v-if="examData && !currentQuestion" class="py-8 md:py-16 hero__content text-center w-4/5 mx-auto fade-in fade-in-first">
            <div class="title-stuff">
                <h1 class="text-3xl md:text-5xl lg:text-5xl font-bold leading-tight">{{examData.name}}</h1>
                <p class="text-xl pt-4 pb-8 text-gray-700">{{examData.questions.length}} Questions</p>
                <p>{{examData.name}}</p>
                <div class="flex justify-center items-center flex-col">
                    <div class="bg-yellow-500 hover:bg-yellow-600 rounded border border-yellow-600 shadow font-semibold px-6 py-2 inline-block transition duration-500 ease-in-out cursor-pointer text-xl" @click="startExam" variant="info">Begin</div>
                </div>
            </div><!-- end title-stuff -->
        </div>
        <div v-if="start">
            <small class="text-center">{{questionNumber}}/{{questions.length}}</small>
            <b-progress :value="pass" variant="info" striped animated class="my-3"></b-progress>
            <question :choice="currentSelection" :question="currentQuestion" :number="questionNumber" :totalCount="questions.length" @storeChoice="storeChoice" />
        </div>

        <b-overlay :show="busy" no-wrap @shown="onShown" @hidden="onHidden">
            <template #overlay>
            <div v-if="processing" class="text-center p-4 bg-primary text-light rounded">
                <!-- <b-icon icon="cloud-upload" font-scale="4"></b-icon> -->
                <div class="mb-3">Processing...</div>
                <b-progress
                    min="1"
                    max="20"
                    :value="counter"
                    variant="success"
                    height="3px"
                    class="mx-n4 rounded-0"
                ></b-progress>
            </div>
            <div
                v-else
                ref="dialog"
                tabindex="-1"
                role="dialog"
                aria-modal="false"
                aria-labelledby="form-confirm-label"
                class="text-center p-3"
            >
                <p><strong id="form-confirm-label">Are you sure?</strong></p>
                <div class="d-flex">
                <b-button variant="outline-danger" class="mr-3" @click="onCancel">
                    Cancel
                </b-button>
                <b-button variant="outline-success" @click="onOK">OK</b-button>
                </div>
            </div>
            </template>
        </b-overlay>
        <b-modal v-model="show" centered title="" hide-footer hide-header>
           <div class="w-full text-center mt-4 flex flex-col justify-between">
            <img data-src="/img/icon-star.png" class="w-10 lazy self-start py-2 mx-auto lg:mx-0 loaded" alt="Benefit Icon" data-ll-status="loaded" src="/img/icon-star.png">
            <div>
                <h4 class="mb-0 font-bold">Congratulation!</h4>
                <p class="mb-0">Congratulations on completing the test, your score is: </p>
                <div class="mt-3 bg-yellow-500 hover:bg-yellow-600 rounded border border-yellow-600 shadow font-semibold px-6 py-2 inline-block transition duration-500 ease-in-out cursor-pointer text-xl">Review The Exam</div>
            </div>
          </div>
        </b-modal>
    </div>
</div>
</template>

<script>
// import SingleQuestion from './SingleQuestion'
// import Timer from './Timer'
import Question from './question';

export default {
    name: "Exam",
    components: {
        Question,
    },
    props: ['hours', 'minutes', 'subject', 'classId', 'mainsubject'],
    data() {
        return {
            currentQuestion: localStorage.getItem('current') || null,
            questionNumber: 0,
            choices: this.$store.state.choices,
            selectedOption: null,
            examData: null,
            start: false,
            loading: false,
            questions: null,
            busy: false,
            processing: false,
            counter: 1,
            interval: null,
            show: false,
        }
    },
    beforeDestroy() {
      this.clearInterval()
    },
    methods: {
        startExam() {
            // if (!this.hasStarted) {
            //     this.$store.dispatch('startExam', {hours: this.hours, minutes: this.minutes, subjectId: this.subject, classId: this.classId})
            //     .then(() => {
            //         this.currentQuestion = this.questions[0]
            //         this.questionNumber = 1
            //         this.getChosenOption()
            //     })
            //     .catch(err => {
            //         console.log(err)
            //     })
            // }

            // else {
            //     this.currentQuestion = this.questions[0]
            //     this.questionNumber = 1
            //     this.getChosenOption()
            // }
            this.questions = this.examData.questions
            this.currentQuestion = this.examData.questions[this.questionNumber];
            this.start = true
            this.questionNumber = 1
        },
        updateSelection(val) {
            this.$store.commit('UPDATE_SELECTION', val)
        },
        getChosenOption() {
            let selectedArray = this.choices.filter(choice => choice.question == this.questionNumber - 1)
            let selectedOption = selectedArray.length > 0 ? selectedArray[0].choice : null

            this.selectedOption = selectedOption;
        
            if (selectedOption || selectedOption === 0) {
                this.$store.commit('STORE_CHOICE', {choices: this.choices, currentQuestionNumber: this.questionNumber, currentSelectedOption: this.selectedOption})
            }
        },
        hasNotBeenAnswered(questionNumber) {
            let check = this.choices.filter(choice => choice.question == questionNumber)
            if (check.length > 0) {
                if (check[0].choice == null) {
                    return true
                }
                else {
                    return false
                }
            }
            else {
                return true
            }
        },
        storeChoice(type, selected, questionNumber, index=undefined) {
            let _canGo = false
            if (this.currentSelection || this.currentSelection === 0 || ['submit','previous'].includes(type)) {
                _canGo = true
            } else if (!selected && selected !== 0  ) {
                this.$bvToast.toast(`ERROR!`, {
                    title: 'Please choose a answer.',
                    autoHideDelay: 8000,
                    appendToast: true,
                    variant: 'danger',
                })
                return;
            } else {
                _canGo = true
            }

            if (_canGo && (selected || selected === 0)) {
                // this.choices = this.choices.filter(choice => choice.question !== questionNumber - 1)
                // this.choices.push({question: questionNumber - 1, choice: selected})
                let _idx = this.choices.findIndex(choice => choice.question === Number(questionNumber - 1))
                if (_idx > -1) {
                    this.choices.splice(_idx, 1, {question: questionNumber - 1, choice: selected});
                } else {
                    this.choices.push({question: questionNumber - 1, choice: selected});
                }
            }

            if (['next','previous'].includes(type)) {
                // if (!selected) return;
                if (type == 'next') {
                    this.questionNumber++
                    this.currentQuestion = this.questions[this.questionNumber - 1]
                    // this.getChosenOption()
                } else {
                    this.questionNumber -= 1;
                    this.currentQuestion = this.questions[this.questionNumber - 1]
                    // this.getChosenOption()
                }
            } else if (type == 'random') { 
                this.questionNumber = index + 1;
                this.currentQuestion = this.questions[this.questionNumber - 1]
                // this.getChosenOption()
            } else if (type == 'submit') {
                this.choices = this.choices.filter(choice => choice.question !== questionNumber - 1)
                this.choices.push({question: questionNumber - 1, choice: selected})
                this.dialog = false
                this.submitPage = true
                // this.getChosenOption()
                this.onSubmit()
            }
        },
        fetchExam() {
            let id = window.location.href.split('/').pop();
            this.loading = true
            this.$http
                .get(`/student/exams/${id}`)
                .then((res) => {
                    console.log("🚀 ~ file: Exam.vue ~ line 154 ~ .then ~ res", res)
                    if (res && res.data) {
                        this.examData = res.data.data
                        this.setExamType(res.data.data.type)
                    } else {
                        this.loading = false
                        // this.$router.push('/student/exams')
                        alert(
                        res.data.message
                            ? res.data.message
                            : "There was an error deleting this question, please try again."
                        );
                    }
                })
                .catch((err) => {
                    // this.btnLoading = false;
                    // this.dialog = false;
                    // console.log(err.response.data);
                    alert(
                        err.response && err.response.status == 403
                            ? err.response.data.message
                            : "There was an error deleting this question, please try again."
                    );
                })
                .finally(() => {
                    this.loading = false
                });
        },
        setExamType(type) {
            this.$store.commit('SET_EXAM_TYPE', type)
        },
        clearInterval() {
            if (this.interval) {
            clearInterval(this.interval)
            this.interval = null
            }
        },
        onShown() {
            // Focus the dialog prompt
            this.$refs.dialog.focus()
        },
        onHidden() {
            // // In this case, we return focus to the submit button
            // // You may need to alter this based on your application requirements
            // this.$refs.submit.focus()
        },
        onSubmit() {
            this.processing = false
            this.busy = true
        },
        onCancel() {
            this.busy = false
        },
        onOK() {
            // TODO: Submit the EXAM
            this.counter = 1
            this.processing = true
            // Simulate an async request
            this.clearInterval()
            this.interval = setInterval(() => {
            if (this.counter < 20) {
                this.counter = this.counter + 1
            } else {
                this.show = true
                this.clearInterval()
                this.$nextTick(() => {
                this.busy = this.processing = false
                })
            }
            }, 350)
        },
    },
    computed: {
        examtime() {
            let time;
            if (this.hours > 0) {
                if (this.hours == 1) {
                    this.minutes == 0 ? time = "1 hour" : time = `1 hour and ${this.minutes} minutes`
                }
                else {
                    this.minutes == 0 ? time = `${this.hours} hours` : time = `${this.hours} hours and ${this.minutes} minutes`
                }
            }

            else {
                time = `${this.minutes} minutes`
            }

            return time
        },
        currentSelection() {
            // return this.$store.state.currentSelectedOption
            let _temp = this.choices.filter(choice => choice.question == this.questionNumber - 1)
            return _temp.length > 0 ? _temp[0].choice : null
        },
        hasStarted() {
            return this.$store.getters.hasStarted
        },
        hasEnded() {
            return this.$store.getters.hasEnded
        },
        pass() {
            return this.questionNumber / this.questions.length * 100 
        },
    },
    mounted() {
        this.fetchExam()
    }
}
</script>

<style>
    .question-body {
        padding: 130px 100px 50px;
        height: 100vh;
        overflow-y: scroll;
    }
    .question-body input {
        margin-right: 15px;
    }

    .radioBtn {
        width: 15px;
        height: 15px;
    }

    .radios:hover {
        border:solid #204d74 1px;
        cursor: pointer;
    }
</style>
