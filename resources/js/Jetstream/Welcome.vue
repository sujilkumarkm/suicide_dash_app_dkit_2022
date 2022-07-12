<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200 justify-between item-center">
            <img class="h-22 w-20 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
            <div class="mt-8 text-2xl">
                Welcome  {{ $page.props.user.name }},
            </div>
            <div class="mt-6 text-gray-500">
                Email:  <span class="ml-2">{{ $page.props.user.email }}</span>
            </div>

            <div class="mt-6 text-gray-500">
                Age:  <span class="ml-2">{{ parseDate($page.props.user.profile.dob) }}</span>
            </div>

            <div class="mt-6 text-gray-500">
                Joined :  <span class="ml-2">{{ parseDate($page.props.user.created_at) }} ago.</span>
            </div>
            <div class="mt-6 text-gray-500">
                Phone:  <span class="ml-2">{{ $page.props.user.phone }}</span>
            </div>
            <div class="mt-6 text-gray-500">
                Gender:  <span class="ml-2">{{ $page.props.user.profile.gender }}</span>
            </div>
            <div class="mt-6 text-gray-500">
                About Me: <span class="ml-2">{{ $page.props.user.other.aboutme }}</span>
            </div>
            <div class="mt-6 text-gray-500">
                Job : <span class="ml-2">{{ $page.props.user.job.occupation }}</span>
            </div>
            <div class="mt-6 text-gray-500">
                Education : <span class="ml-2">{{ $page.props.user.education.degree }}</span>
            </div>
            <div class="mt-6 pb-4 text-gray-500">
                Height : <span class="ml-2">{{ $page.props.user.physical.height }}</span>
            </div>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue'
    import moment from 'moment';

    export default defineComponent({
        props:[],

        components: {
            JetApplicationLogo,
        },
        methods:{
            parseDate(date) {
                let end = moment(date).format('YYYY-MM-DD HH:mm:ss');
                let diff_days = moment().diff(end, 'days');
                let diff_hrs = moment().diff(end, 'hours');
                let diff_mins = moment().diff(end, 'minutes');
                let diff_months = moment().diff(end, 'months');
                let diff_years = moment().diff(end, 'years');

                if(diff_days<1){
                    if(diff_hrs==0){
                        return diff_mins+' minutes';
                    }
                    else{
                        if(diff_hrs==1 ){
                            return diff_hrs+' hour';
                        }
                        return diff_hrs+' hours';
                    }
                }
                else if(diff_days==1){
                    return 'Yesterday';
                }
                else if(diff_months>12){
                    if(diff_months>12){
                        return diff_years+' years';
                    }
                    else{
                        if(diff_months>12 ){
                            return diff_years+' years';
                        }
                        return diff_years+' years';
                    }
                }
                else if(diff_months<12) {
                    return diff_months + ' months ';
                }
            },
        }

    })

</script>
