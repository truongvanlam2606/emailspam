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
                <b-form-radio size="lg" v-model="isCorrect" title="Mark this option as correct" :value="k" class="d-flex align-items-center h-100"></b-form-radio>
            </b-col>
            <b-col :class="option.content.image ? 'col-md-8' : 'col-md-4'">
                <h4>Answer {{k + 1}}</h4>
                <b-row>
                    <b-col class="upload-image" v-show="option.content.image">
                        <b-img fluid :src="'/storage'+option.content.image" />
                    </b-col>
                    <b-col>
                        <UploadImages :uploadMsg="option.content.image ? 'Edit image' : 'Click to upload or drop your image here'" v-model="option.content.image" class="upload-image" :max="1" maxError="Max files exceed" fileError="images files only accepted" @changed="(data) => handleImages(data, k)"/>
                    </b-col>
                </b-row>
                <hr>
            </b-col>
            <b-col class="col-md-1">
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
import UploadImages from "vue-upload-drop-images"
export default {
    name: "SelectImage",
    props: ['options'],
    data() {
        return {
            isCorrect: false,
        };
    },
    watch: {
        isCorrect (val) {
            this.options.forEach(option => {
                option.is_correct = false
            })
            this.options[val].is_correct = true
            this.$emit("updateCorrect", val);
        },
    },
    mounted() {},
    computed: {},
    methods: {
        add () {
            this.options.push({
                content: {
                    image: "",
                },
                is_correct: false
            })
        },
        remove (index) {
            this.options.splice(index, 1)
        },
        handleImages(images, index) {
            if (images.length) {
                var reader = new FileReader();
                reader.readAsDataURL(images[0]);
                reader.onload = () => {
                    console.log(reader.result);
                    this.$http
                    .post("files/image-single/upload", {
                        image: reader.result.replace(/^.+?;base64,/, ''),
                    })
                    .then((res) => {
                        console.log("🚀 ~ file: SelectImage.vue ~ line 76 ~ .then ~ res", res)
                        if (res && !res.data.error) {
                            this.$emit("callBackUploadFile", res.data, index);
                        }
                    })
                    .catch((err) => {
                        console.log(err.response.data);
                        alert(
                            err.response.status == 403
                                ? err.response.data.message
                                : "There was an error submitting this question, please try again."
                        );
                    });
                };
            }
        },
    },
    components: {
        UploadImages
    }
};
</script>

<style scope>
.upload-image.container {
    width: fit-content !important;
    height: fit-content !important;
    margin: 0 auto;
}
.upload-image.container .plus, .upload-image.container .clearButton {
    display: none;
}
.upload-image.container .mainMessage {
    white-space: nowrap;
}
</style>