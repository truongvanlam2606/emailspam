<template>
    <div>
        <b-row class="mt-3">
            <b-col>
                <b-form-group
                    label="Correct Answer"
                    label-for="input"
                >
                    <b-form-input id="input" v-model="text" placeholder="Enter correct answer"></b-form-input>
                 </b-form-group>
            </b-col>
        </b-row>
    </div>
</template>

<script>
export default {
    name: "FillBlank",
    props: ["correct"],
    data() {
        return {
            text: this.correct,
        };
    },
    watch: {
        text (val) {
            this.$emit("updateCorrect", val);
        },
    },
    mounted() {},
    computed: {},
};
</script>
