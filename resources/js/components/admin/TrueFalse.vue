<template>
    <div>
        <b-row class="mt-3">
            <b-col>
                <h3>Answer</h3>
                <p style="color: #ff5500">
                    (Note: Click the checkbox beside an option to mark it as the correct option)
                </p>
                <hr />
            </b-col>
        </b-row>
        <b-row class="d-flex align-items-center">
            <b-col class="col-md-1">
                <b-form-radio v-model="isCorrect" title="Mark this option as correct" value="0"></b-form-radio>
            </b-col>
            <b-col class="col-md-11">
                <h4>False</h4>
            </b-col>
        </b-row>
        <b-row class="d-flex align-items-center">
            <b-col class="col-md-1">
                <b-form-radio v-model="isCorrect" title="Mark this option as correct" value="1"></b-form-radio>
            </b-col>
            <b-col class="col-md-11">
                <h4>True</h4>
            </b-col>
        </b-row>
    </div>
</template>

<script>
export default {
    name: "TrueFalse",
    props: ['options', 'correct'],
    components: {},
    data() {
        return {
            isCorrect: this.correct,
        };
    },
    watch: {
        isCorrect (val) {
            this.$emit("updateCorrect", val);
        },
    },
    mounted() {},
    computed: {},
};
</script>
