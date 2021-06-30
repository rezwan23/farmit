<template>
    <breeze-validation-errors class="mb-4" />

    <form @submit.prevent="submit">
        <div>
            <breeze-label for="name" value="Name" />
            <breeze-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
        </div>

        <div class="mt-4">
            <breeze-label for="email" value="Email" />
            <breeze-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autocomplete="username" />
        </div>

        <div class="mt-4">
            <breeze-label for="phone_no" value="Phone Number" />
            <breeze-input id="phone_no" type="text" class="mt-1 block w-full" v-model="form.phone_no" required autocomplete="new-password" />
        </div>

        <div class="mt-4">
            <breeze-label for="nid" value="NID" />
            <breeze-input id="nid" type="text" class="mt-1 block w-full" v-model="form.nid" required autocomplete="new-password" />
        </div>

        <div class="mt-4">
            <breeze-label for="tyoe" value="Type" />
            <select id="phone_no" type="s" class="mt-1 block w-full" v-model="form.type" required autocomplete="new-password" >
                <option>Farmer</option>
                <option>Carrier</option>
            </select>
        </div>

        <div class="mt-4">
            <breeze-label for="password" value="Password" />
            <breeze-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
        </div>

        <div class="mt-4">
            <breeze-label for="password_confirmation" value="Confirm Password" />
            <breeze-input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <inertia-link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                Already registered?
            </inertia-link>

            <breeze-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Register
            </breeze-button>
        </div>
    </form>
</template>

<script>
    import BreezeButton from '@/Components/Button'
    import BreezeGuestLayout from '@/Layouts/Guest'
    import BreezeInput from '@/Components/Input'
    import BreezeLabel from '@/Components/Label'
    import BreezeValidationErrors from '@/Components/ValidationErrors'

    export default {
        layout: BreezeGuestLayout,

        components: {
            BreezeButton,
            BreezeInput,
            BreezeLabel,
            BreezeValidationErrors,
        },

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    terms: false,
                    nid : '',
                    phone_no: '',
                    type:'',
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => {this.form.reset('password', 'password_confirmation')},
                    onSuccess: () => {window.location.reload()}
                })
            }
        }
    }
</script>
