<template>
    <div class="contact1">
        <div class="container-contact1">
            <div class="contact1-pic js-tilt" data-tilt>
                <img :src="img" alt="IMG">
            </div>
            <form @submit.prevent="sendMessage" class="contact1-form validate-form">
                <div v-if="messages" class="bg-green-200 w-96 h-16 flex">
                    <div class="h-16 w-1 bg-green-500"></div>
                    <p class="text-lg pl-2 font-bold">{{ messages }}</p>
                </div>
                <div v-if="errorMessage" class="bg-red-200 w-96 h-16 flex">
                    <div class="h-16 w-1 bg-red-500"></div>
                    <p class="text-lg pl-2 font-bold">{{ errorMessage }}</p>
                </div>
				<span class="contact1-form-title">
					Get in touch
				</span>

                <div class="wrap-input1 validate-input" data-validate = "Name is required">
                    <label class="font-bold"><span class="text-red-500">*</span> Name:</label>
                    <input class="input1" type="text" name="name" placeholder="Name" v-model="name" required>
                    <span class="shadow-input1"></span>
                </div>

                <div class="wrap-input1 validate-input" data-validate = "Phone number is required">
                    <label class="font-bold"><span class="text-red-500">*</span> Phone number:</label>
                    <input class="input1" type="tel" name="phone_number" placeholder="Phone number" v-model="phone_number" required>
                    <span class="shadow-input1"></span>
                </div>


                <div class="wrap-input1 validate-input" data-validate = "Message is required">
                    <label class="font-bold"><span class="text-red-500">*</span> Message:</label>
                    <textarea class="input1" name="message" placeholder="Message" v-model="message" required></textarea>
                    <span class="shadow-input1"></span>
                </div>

                <div class="container-contact1-form-btn">
                    <button @click.prevent="sendMessage" class="contact1-form-btn" form="">
						<span>
							Send
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "App",
    data(){
        return{
            img: "/assets/images/img-01.png",
            name: "",
            phone_number: "",
            message: "",
            messages: null,
            errorMessage: null
        }
    },
    methods: {
        sendMessage(){
            axios.post("/api/sendmessage", {name: this.name, phone_number: this.phone_number, message: this.message}).then(response => {
                this.messages = response.data.message;
                this.errorMessage = ""
            })
                .catch(error => {
                    this.messages = ""
                    this.errorMessage = error.response.data.message;
                    console.log(error)
                })
        }
    }
}
</script>

<style scoped>

</style>
