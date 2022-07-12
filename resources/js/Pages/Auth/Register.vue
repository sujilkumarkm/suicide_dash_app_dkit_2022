<template>
    <Head title="Register" />

    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo />
        </template>

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <jet-label for="name" value="Name" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
            </div>
            <div class="mt-4 pb-4">
            <jet-label for="gender" value="Sex" />
            <select name="gender" v-model="form.gender" class="mt-1 w-full block pb-2">
                <option value="">-- Please select --</option>
                <option v-bind:value="'Male'">Male</option>
                <option v-bind:value="'Female'">Female</option>
                <option v-bind:value="'Not Disclosed'">Not Disclosed</option>
            </select>
            </div>
            <div class="mt-4 pb-4">
                <jet-label for="status" value="Marital Status" />
                <select name="status" id="status" v-model="form.status" class="mt-1 w-full block pb-2">
                    <option disabled value="">--Marital Status--</option>
                    <option v-bind:value="'Single'">Never Married</option>
                    <option v-bind:value="'Divorced'">Divorced</option>
                    <option v-bind:value="'Widowed'">Widowed</option>
                    <option v-bind:value="'Separated'">Separated</option>
                </select>
            </div>
            <div class="mt-4 pb-4">
                <jet-label for="phone" value="Mobile" />
                <jet-input id="phone" type="text" class="mt-1 block w-full" v-model="form.phone" required autofocus autocomplete="phone" />
            </div>
            <div class="mt-4 pb-4">
                <jet-label for="cast" value="Cast" />
                <select name="cast" v-model="form.cast"  id='cast' class="mt-1 w-full block pb-2">
                    <option disabled value="">-- Caste  --</option>
                    <option v-bind:value="'Ganaka'">Ganaka</option>
                    <option v-bind:value="'Kaniyan'">Kani or Kaniyan</option>
                    <option v-bind:value="'Kanisan'">Kanisan</option>
                    <option v-bind:value="'Kanisu'">Kanisu</option>
                    <option v-bind:value="'Kamnan'">Kamnan</option>
                    <option v-bind:value="'Kaniyar_Panicker'">Kaniyar Panicker</option>
                    <option v-bind:value="'Kalari_Panicker'">Kalari Panicker</option>
                    <option v-bind:value="'Kalari_Kuruppu'">Kalari Kuruppu</option>
                    <option v-bind:value="'Panicker'">Panicker</option>
                    <option v-bind:value="'other'">Other</option>
                </select>
            </div>

            <div class="mt-4 pb-4">
                <jet-label for="dob" value="Date of birth" />
                <jet-input id="dob" type="date" class="mt-1 block w-full" v-model="form.dob" required autofocus autocomplete="dob" />
            </div>

            <div class="mt-4 pb-4">
                <jet-label for="tob" value="Time of birth" />
                <jet-input id="tob" type="time" class="mt-1 block w-full" v-model="form.tob" required autofocus autocomplete="tob" />
            </div>
            <div class="mt-4 pb-4">
                <jet-label for="star" value="Star" />
                <select name="star" v-model="form.star" class="mt-1 w-full block pb-2">
                    <option disabled value="">-- Please select --</option>
                    <option v-bind:value="'ASWATHY'">Aswini(ASWATHY)</option>
                    <option v-bind:value="'BHARANI'">BHARANI</option>
                    <option v-bind:value="'KARTHIKA'">Krittika(KARTHIKA)</option>
                    <option v-bind:value="'ROHINI'">ROHINI</option>
                    <option v-bind:value="'MAKAYIRAM'">Mrigashira(MAKAYIRAM)</option>
                    <option v-bind:value="'THIRUVATHIRA'">Ardra(THIRUVATHIRA)</option>
                    <option v-bind:value="'PUNARTHAM'">Punarvasu(PUNARTHAM)</option>
                    <option v-bind:value="'POOYAM'">Pushya(POOYAM)</option>
                    <option v-bind:value="'AYILYAM'">Ashlesha(AYILYAM)</option>
                    <option v-bind:value="'MAKAM'">Makha(MAKAM)</option>
                    <option v-bind:value="'POORAM'">Purva Phalguni(POORAM)</option>
                    <option v-bind:value="'UTRAM'">Uttara Phalguni(UTRAM)</option>
                    <option v-bind:value="'ATHAM'">Hasta(ATHAM)</option>
                    <option v-bind:value="'CHITHIRA'">Chitra(CHITHIRA)</option>
                    <option v-bind:value="'CHOTHY'">Swati(CHOTHY)</option>
                    <option v-bind:value="'VISHAKAM'">VISHAKAM</option>
                    <option v-bind:value="'ANIZHAM'">Anuradha(ANIZHAM)</option>
                    <option v-bind:value="'TRIKETTA'">Jyeshta(TRIKETTA)</option>
                    <option v-bind:value="'MOOLAM'">Mula(MOOLAM)</option>
                    <option v-bind:value="'POORADAM'">Purva Ashada(POORADAM)</option>
                    <option v-bind:value="'UTHARADAM'">Uttara Ashada(UTHARADAM)</option>
                    <option v-bind:value="'THIRUVONAM'">Shravana(THIRUVONAM)</option>
                    <option v-bind:value="'AVITTAM'">Dhanista(AVITTAM)</option>
                    <option v-bind:value="'CHATHAYAM'">Sathabhisha(CHATHAYAM)</option>
                    <option v-bind:value="'PURURUTTATHY'">Purva Bhadrapada(PURURUTTATHY)</option>
                    <option v-bind:value="'UTHRITTATHY'">Uttara Bhadrapada(UTHRITTATHY)</option>
                    <option v-bind:value="'REVATI'">Revati(REVATI)</option>
                    <option v-bind:value="'Doesnt_Know'">Doesn't Know</option>
                </select>
            </div>
            <div class="mt-4 pb-4">
                <jet-label for="formem" value="Created By" />
                <select name="formem" v-model="form.formem"  id='formem' class="mt-1 w-full block pb-2">
                    <option disabled value="">--Profile Created For--</option>
                    <option v-bind:value="'Myself'">Myself</option>
                    <option v-bind:value="'Daughter'">Daughter</option>
                    <option v-bind:value="'Son'">Son</option>
                    <option v-bind:value="'Sister'">Sister</option>
                    <option v-bind:value="'Brother'">Brother</option>
                    <option v-bind:value="'Cousine'">Cousine</option>
                    <option v-bind:value="'Sister'">Friend</option>
                </select>
            </div>
            <div class="mt-4 pb-4">
                <jet-label for="jathakam" value="Jathakam" />
                <select name="jathakam" v-model="form.jathakam"  id='jathakam' class="mt-1 w-full block pb-2">
                    <option disabled value="">--Jathakam--</option>
                    <option v-bind:value="'Sudham'">Sudham</option>
                    <option v-bind:value="'Papam'">Papam</option>
                    <option v-bind:value="'un_available'">Not disclosed</option>
                </select>
            </div>
            <div class="mt-4">
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required />
            </div>

            <div class="mt-4">
                <jet-label for="password" value="Password" />
                <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <jet-label for="password_confirmation" value="Confirm Password" />
                <jet-input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
            </div>
            <div class="mt-4 form-text-container">
                <jet-label for="aboutme" value="About Me"/>
                <textarea id="aboutme" type="textarea" class="mt-1 block w-full form-input form-text" v-model="form.aboutme" required autofocus autocomplete="aboutme"> </textarea>
            </div>
            <div class="mt-4" v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature">
                <jet-label for="terms">
                    <div class="flex items-center">
                        <jet-checkbox name="terms" id="terms" v-model:checked="form.terms" />

                        <div class="ml-2">
                            I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Privacy Policy</a>
                        </div>
                    </div>
                </jet-label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Already registered?
                </Link>

                <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </jet-button>
            </div>
        </form>
    </jet-authentication-card>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetCheckbox from '@/Jetstream/Checkbox.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Head,
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors,
            Link,
        },

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    phone: '',
                    gender: '',
                    email: '',
                    dob: '',
                    tob: '',
                    star: '',
                    jathakam: '',
                    formem: '',
                    aboutme: '',
                    cast:'',
                    status:'',
                    password: '',
                    password_confirmation: '',
                    terms: false,
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        }
    })
</script>
