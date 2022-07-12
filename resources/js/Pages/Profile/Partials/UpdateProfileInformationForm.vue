<template>
    <jet-form-section @submitted="updateProfileInformation">
        <template #title>
            Profile Information
        </template>

        <template #description>
            Update your account's profile information and email address.
        </template>

        <template #form>
            <!-- Profile Photo -->
            <div class="col-span-6 sm:col-span-4" v-if="$page.props.jetstream.managesProfilePhotos">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            ref="photo"
                            @change="updatePhotoPreview">

                <jet-label for="photo" value="Photo" />

                <!-- Current Profile Photo -->
                <div class="mt-2" v-show="! photoPreview">
                    <img :src="user.profile_photo_url" :alt="user.name" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" v-show="photoPreview">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          :style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <jet-secondary-button class="mt-2 mr-2" type="button" @click.prevent="selectNewPhoto">
                    Select A New Photo
                </jet-secondary-button>

                <jet-secondary-button type="button" class="mt-2" @click.prevent="deletePhoto" v-if="user.profile_photo_path">
                    Remove Photo
                </jet-secondary-button>

                <jet-input-error :message="form.errors.photo" class="mt-2" />
            </div>

            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="name" value="Name" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autocomplete="name" />
                <jet-input-error :message="form.errors.name" class="mt-2" />
            </div>
            <!-- Mobile -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="phone" value="Mobile" />
                <jet-input id="phone" type="text" class="mt-1 block w-full" v-model="form.phone" required autofocus autocomplete="phone" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="dob" value="Date of birth" />
                <jet-input id="dob" type="date" class="mt-1 block w-full" v-model="form.dob" required autofocus autocomplete="dob" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="tob" value="Time of birth" />
                <jet-input id="tob" type="time" class="mt-1 block w-full" v-model="form.tob" required autofocus autocomplete="tob" />
            </div>
            <div class="col-span-6 sm:col-span-4">
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
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="status" value="Marital Status" />
                <select name="status" id="status" v-model="form.status" class="mt-1 w-full block pb-2">
                    <option disabled value="">--Marital Status--</option>
                    <option v-bind:value="'Single'">Never Married</option>
                    <option v-bind:value="'Divorced'">Divorced</option>
                    <option v-bind:value="'Widowed'">Widowed</option>
                    <option v-bind:value="'Separated'">Separated</option>
                </select>
            </div>

            <!-- Gender -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="gender" value="Sex" />
                <select name="gender" v-model="form.gender">
                    <option disabled value="">-- Please select --</option>
                    <option v-bind:value="'Male'">Male</option>
                    <option v-bind:value="'Female'">Female</option>
                    <option v-bind:value="'Not Disclosed'">Not Disclosed</option>
                </select>
            </div>
            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" />
                <jet-input-error :message="form.errors.email" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetFormSection from '@/Jetstream/FormSection.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetInputError from '@/Jetstream/InputError.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetActionMessage from '@/Jetstream/ActionMessage.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'

    export default defineComponent({
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
        },

        props: ['user'],

        data() {
            return {
                form: this.$inertia.form({
                    _method: 'PUT',
                    name: this.user.name,
                    phone: this.user.phone,
                    email: this.user.email,
                    gender: this.user.profile.gender,
                    photo: null,
                    status: this.user.other.status,
                    dob: this.user.profile.dob,
                    tob: this.user.profile.tob,
                    star: this.user.profile.star,
                }),

                photoPreview: null,
            }
        },

        methods: {
            updateProfileInformation() {
                if (this.$refs.photo) {
                    this.form.photo = this.$refs.photo.files[0]
                }

                this.form.post(route('user-profile-information.update'), {
                    errorBag: 'updateProfileInformation',
                    preserveScroll: true,
                    onSuccess: () => (this.clearPhotoFileInput()),
                });
            },

            selectNewPhoto() {
                this.$refs.photo.click();
            },

            updatePhotoPreview() {
                const photo = this.$refs.photo.files[0];

                if (! photo) return;

                const reader = new FileReader();

                reader.onload = (e) => {
                    this.photoPreview = e.target.result;
                };

                reader.readAsDataURL(photo);
            },

            deletePhoto() {
                this.$inertia.delete(route('current-user-photo.destroy'), {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.photoPreview = null;
                        this.clearPhotoFileInput();
                    },
                });
            },

            clearPhotoFileInput() {
                if (this.$refs.photo?.value) {
                    this.$refs.photo.value = null;
                }
            },
        },
    })
</script>
