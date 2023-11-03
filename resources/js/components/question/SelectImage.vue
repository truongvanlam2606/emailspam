<template>
    <div class="grid text-center">
        <div class="panel-question w-full lg:w-8/12 text-center mx-auto">
            <h2 class="block text-2xl md:text-4xl leading-tight font-bold">{{ question.name }}</h2>
        </div>
        <p class="text-lg py-2 text-gray-700" v-html="question.data_raw.main_content"></p>
        <vue-select-image :selectedImages="answer" :dataImages="dataImages" @onselectimage="onSelectImage">
        </vue-select-image>
    </div>
</template>

<script>
export default {
    name: "SelectImage",
    props: ["question", "choice"],
    data() {
        return {
            // dataImages: [
            //     {
            //         id: "1",
            //         src: "https://unsplash.it/200?random",
            //         alt: "Alt Image 1",
            //     },
            //     {
            //         id: "2",
            //         src: "https://unsplash.it/200?random",
            //         alt: "Alt Image 2",
            //     },
            //     {
            //         id: "3",
            //         src: "https://unsplash.it/200?random",
            //         alt: "Alt Image 2",
            //     },
            // ],
        };
    },
    methods: {
        onSelectImage(value) {
            console.log(
                "🚀 ~ file: SelectImage.vue ~ line 34 ~ onSelectImage ~ value",
                value.id
            );
            this.$emit("updateAnswer", value.id);
        },
    },
    computed: {
        dataImages: function() {
            return this.question ? this.question.data_raw.options.map((item, index) => { return { 'id': index, 'src': '/storage/'+item.content.image, 'alt': "image" } }) : []
        },
        answer: function() {
            return this.choice || this.choice === 0 ? this.dataImages.filter(x => x.id === this.choice) : [];
        },
    },
    watch: {},
    components: {},
};
</script>

<style></style>
