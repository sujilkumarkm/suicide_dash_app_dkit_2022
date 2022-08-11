<template>
     <div class="index">
        <div class="banner-five">
            <div class="owl-carousel owl-theme banner-slider-five">
                <div class="item" style="background-image: url('/assets/img/banner1.jpg')">
                </div>
                <div class="item" style="background-image: url('/assets/img/banner2.jpg')">
                </div>
                <div class="item" style="background-image: url('/assets/img/banner3.jpg')">
                </div>
            </div>


        </div>
        <div class="container">
            <h3 class="common-head">FEATURED <span style="color:red;">PROFILES</span></h3>
            <div class="row mt-40">
                <div class="col-md-4 col-sm-6">
                    <div class="box1"> <img src="/assets/img/our-team3.jpg" alt="">
                        <h3 class="title">Arjun Saji</h3>
                        <ul class="icon">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="box1"> <img src="/assets/img/our-team1.jpg" alt="" class="img-thumbn">
                        <h3 class="title">Sujil Kumar K.M</h3>
                        <ul class="icon">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="box1"> <img src="/assets/img/our-team2.jpg" alt="">
                        <h3 class="title">Shruthi S</h3>
                        <ul class="icon">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
             <div class="row mt-40">k
                <div class="col-md-4 col-sm-6">
                    <div class="box1"> <img src="/assets/img/our-team3.jpg" alt="">
                        <h3 class="title">Arjun Saji</h3>
                        <ul class="icon">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="box1"> <img src="/assets/img/our-team1.jpg" alt="" class="img-thumbn">
                        <h3 class="title">Sujil Kumar K.M</h3>
                        <ul class="icon">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="box1"> <img src="/assets/img/our-team2.jpg" alt="">
                        <h3 class="title">Shruthi S</h3>
                        <ul class="icon">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="our-team" v-if="profiles.length!=0">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 my-auto">
                        <h3 class="common-head">OUR <span style="color:red;">TEAM</span></h3>
                    </div>
                    <!--<div class="col-sm-6 my-auto">
                        <a href="" class="view-all">view all</a>
                    </div>-->
                </div>
            </div>
            <div class="left-container">
                <div class="owl-carousel owl-theme our-team-slider" >
                    <div class="item" v-for="(profile,index) in profiles">
                        <div class="team">
                            <div class="image">
                                <a :href="'/profile?name='+profile.name">
                                    <img :src="'/'+profile.cover_photo" alt="" class="img-fluid">
                                </a>
                                <ul class="social-media">
                                    <li><a :href="profile.facebook" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a :href="profile.twitter" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a :href="profile.linkedin" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a :href="profile.instagram" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="details">
                                <h5>{{profile.name}}</h5>
                                <p>{{profile.designation}}</p>
                                <a :href="'tel:'+profile.phone" class="phone" >{{mask(profile.phone)}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="index-about">
            <div class="container">
                <H3 class="common-head">About us</H3>
                <span v-if="site_details.about_us"  v-html="strabout(site_details.about_us)"></span>
                <a href="/about" class="join-now">read more</a>
            </div>
        </div>
        <div class="reports">
            <div class="container">
                <h3 class="common-head">FREE REAL ESTATE REPORTS</h3>
                <p>Get exclusive VIP reports to help you with your next purchase or sale and learn how to invest<br>
                    your
                    time and money wisely in the market!</p>
                <form action="" method="post" class="contact-form">
                    <input type="text" placeholder="First name" name="name" class="form-control" required>
                    <input type="text" placeholder="Phone" name="phone" class="form-control" data-inputmask='"mask": "+1 (999) 999-9999"' data-mask data-inputmask-clearincomplete="true" required>
                    <input type="email" placeholder="Email" name="email" class="form-control" required>
                    <button type="submit" class="form-control" id="submit" style="color:white;"><img src="/assets/img/submit-arrow.svg" alt=""></button>
                </form>
            </div>
        </div>
    </div>


</template>
<script>
    import 'owl.carousel/dist//assets/owl.carousel.css';
    import 'owl.carousel';

    export default {
        props: ['enq_route','freeholds','site_details','soldlistings','csrf', 'pred_route','dream_route','profiles','awards','precondo'],
        created() {

            this.get_listings();
        },
         watch: {
        'listings' : function() {

            this.$nextTick(()=> {
                if(this.slider)
                    this.slider.trigger('destroy.owl.carousel');

                this.slider = $('.featured-slider').owlCarousel({
                    loop: true,
                    rewind: true,
                    margin: 15,
                    lazyLoad: true,
                    nav: true,
                    dots: false,
                    autoplay: true,
                    autoplayTimeout: 5000,
                    autoplayHoverPause: true,
                    autoplaySpeed: 2500,
                    responsive: {
                        0: {
                            items: 1,
                            margin: 10,
                            center: true
                        },
                        992: {
                            items: 2
                        },
                        1200: {
                            items: 3
                        },
                        1400: {
                            items: 4
                        },
                        1600: {
                            items: 5
                        }
                    }
                 });
                var owl = $('.property-slider');
                owl.owlCarousel({
                    loop: true,
                    margin: 20,
                    nav: true,
                    dots: false,
                    animateOut: 'fadeOut',
                    responsive: {
                        0: {
                            items: 1,
                            margin: 10,
                            center: true,
                            loop: false
                        },
                        600: {
                            items: 1
                        },
                        1000: {
                            items: 1
                        }
                    }
                });
            })
        }
    },
        computed: {},
        data() {
            return {
                show: false,
                show2: false,
                select: 0,
                total: 0,
                s3_url: process.env.MIX_S3_URL,
                loading: false,
                searchfilters: {},
                errors: {},
                listings: {},
                filter: {
                    beds: '',
                    price: '',
                    baths: '',
                    property_type_1: '',
                    search1: '',
                    search: '',
                    search_type: '',
                    sort_by: '',
                    min_price: '',
                    max_price: '',
                    property_type: '',
                    // property_sub_type:[],
                    property_sub_type: '',
                    property_status: '',
                    price_range: '',
                    building_type: '',
                    d_o_m: '',
                    show_only: '',
                    keyword: '',
                    // property_status:[],

                },
                cuns: {
                    name: '',
                    email: '',
                    phone: '',
                    name2: '',
                    email2: '',
                    phone2: '',
                }


            }
        },
        methods: {

            get_lists(filter) {
                var place = this.filter.search1;
                window.location.href = '/residential-properties?property_type_1=' + this.filter.property_type_1 + '&place=' + place + '&search_type=' + this.filter.search_type + '&min_price=' + this.filter.min_price + '&max_price=' + this.filter.max_price + '&property_status=' + this.filter.property_status + '&beds=' + this.filter.beds + '&baths=' + this.filter.baths + '&building_type=' + this.filter.building_type + '&d_o_m=' + this.filter.d_o_m + '&show_only=' + this.filter.show_only + '&keyword=' + this.filter.keyword;


            },

            get_listings() {
                var vm = this;
                vm.loading = true;

                var url = '/featured-listings'

                axios.get(url).then(response => {

                    vm.listings = response.data;
                    vm.loading = false;

                }).catch(err => {
                    vm.loading = false;
                });
            },
            type_change() {
                if (this.filter.property_type_1 == "") {
                    this.filter.property_type = [];
                } else {
                    this.filter.property_type = [];
                    this.filter.property_type[0] = this.filter.property_type_1;
                }

            },

            clear_filter() {
                this.filter.beds = '';
                this.filter.price = '';
                this.filter.baths = '';
                this.filter.property_type_1 = '';
                this.filter.search1 = '';
                this.filter.search = '';
                this.filter.search_type = '';
                this.filter.sort_by = '';
                this.filter.min_br = '';
                this.filter.max_br = '';
                this.filter.min_bath = '';
                this.filter.max_bath = '';
                this.filter.min_sqft = '';
                this.filter.max_sqft = '';
                this.filter.min_price = '';
                this.filter.max_price = '';
                this.filter.yr_built_min = '';
                this.filter.yr_built_max = '';
                this.filter.min_lot_size = '';
                this.filter.max_lot_size = '';
                this.filter.garage_space = '';
                this.filter.property_type = '';
                this.filter.property_sub_type = '';
                this.filter.property_status = '';
                this.filter.building_type = '';
                this.filter.price_range = '';
                this.filter.d_o_m = '';
                this.filter.show_only = '';
                this.filter.keyword = '';


            },
            filter_search() {


                if (this.filter.search1.length < 3 || this.filter.search1 == '') {
                    this.show2 = false;
                    this.show = false;
                    this.select = 0;
                    return false;
                 }
                 else{
                     if(!isNaN(this.filter.search1.charAt(0))) this.filter.search_type='addr';
                     else if(/^[a-zA-Z]{3}/.test(this.filter.search1)) this.filter.search_type='municipality';
                     else if(/^[a-zA-Z][0-9]{2}/.test(this.filter.search1)) this.filter.search_type='ml_num';


                     axios.get('/filter-search-two',{
                        params : {
                            val:this.filter.search1,
                        }
                    }).
                    then(response => {
                       if(response.data.length!=0){
                         // this.show2 = false;
                         this.show = true;
                         this.searchfilters = response.data;
                       }
                       else{

                          this.select =0;
                          this.show = false;

                          if(this.filter.search1!=''){
                           this.show2 = true;
                          }



                       }

                        // this.loading = false;

                    }).
                    catch(err => {
                        // this.loading = false;
                    });
                }

            },
            set_value(item) {
                this.filter.search1=item.field;
                this.filter.search_type=item.type;
                this.select = 1;
                this.show = false;
                this.show2 = false;
                this.get_freeholds();

            },
            filter_price() {
                this.filter.min_price = $('#min_price').val();
                this.filter.max_price = $('#max_price').val();


            },
            exit() {

                // if(this.select==0){
                //       this.filter.search1 ='';
                //      this.show2 = false;
                //      this.show = false;
                //      return false;
                // }
            },
            split(str) {

                return str.split(",");
            },
              strabout(str)
            {
                return str.substr(0,400) + "....";
            },
             mask(str)
            {
              return "+1" + " " +"(" +str.substr(0,3)+ ")" + " "+ str.substr(3,3) +"-" +str.substr(6,9);
            },
          currency(num) {
                return Number(num).toLocaleString('en-US', {style: 'currency', currency: 'USD'}).slice(0,-3);
            },
  disableDropDownRangeOptions(max_values, minValue) {
                var formatter = new Intl.NumberFormat('en-US', {
                    maximumSignificantDigits: 3
                });
                if (max_values) {
                    let minval = parseInt(minValue);
                    if (minval < 600000 || minval == '') {
                        var x = 50000;
                        var y = 50000;
                    } else if (minval >= 600000 && minval < 1500000) {
                        var x = 100000;
                        var y = 100000;
                    } else if (minval == 1500000) {
                        var x = 250000;
                        var y = 250000;
                    } else {
                        var x = 500000;
                        var y = 500000;
                    }
                    max_values.each(function () {
                        if (this.id != 'maxX') {
                            $(this).attr('value', minval + x);
                            $(this).html('$' + formatter.format(minval + x));
                            x += y;
                        }


                        // if (parseInt(maxValue) < parseInt(minValue)) {
                        //     $(this).addClass('disabled');
                        // } else {
                        //     $(this).removeClass('disabled');
                        // }
                    });
                }
            },
            setuinvestRangeDropDownList(min_values, max_values, min_input, max_input, clearLink, dropDownControl) {
                    var vm = this;
                    var formatter = new Intl.NumberFormat('en-US', {
                        maximumSignificantDigits: 3
                    });

                    min_values.click(function () {

                        var minValue = $(this).attr('value');
                        min_input.val(minValue);
                        max_input.val('');
                        vm.filter.min_price = minValue;
                        vm.filter.max_price = '';
                        document.getElementById('price_range1').innerHTML = '$' + formatter.format(minValue);
                        document.getElementById('price_range1').setAttribute('value', minValue);
                        document.getElementById('price_range2').innerHTML = '';
                        document.getElementById('price_range2').setAttribute('value', '');
                        //Update max values
                        vm.disableDropDownRangeOptions(max_values, minValue);
                        vm.validateDropDownInputs();
                    });

                    max_values.click(function () {


                        var maxValue = $(this).attr('value');
                        if (maxValue == '') {
                            max_input.val(maxValue);
                            vm.filter.max_price = maxValue;
                            document.getElementById('price_range2').innerHTML = 'Any';
                            document.getElementById('price_range2').setAttribute('value', '');
                        } else {
                            max_input.val(maxValue);
                            vm.filter.max_price = maxValue;
                            document.getElementById('price_range2').innerHTML = '$' + formatter.format(maxValue);
                            document.getElementById('price_range2').setAttribute('value', maxValue);
                        }
                        vm.toggleDropDown();
                    });

                    clearLink.click(function () {


                        min_input.val('');
                        max_input.val('');

                        vm.filter.min_price = '';
                        vm.filter.max_price = '';



                        document.getElementById('price_range1').innerHTML = '';
                        document.getElementById('price_range1').setAttribute('value', '');
                        document.getElementById('price_range2').innerHTML = 'Price Range';
                        document.getElementById('price_range2').setAttribute('value', '');





                        // vm.disableDropDownRangeOptions(max_values);

                        vm.validateDropDownInputs();

                    });

                    min_input.on('input',
                        function () {
                            var minValue = min_input.val();
                            vm.filter.min_price = minValue;

                            document.getElementById('price_range1').innerHTML = '$' + minValue;
                            document.getElementById('price_range1').setAttribute('value', minValue);
                            if(minValue!='')
                              vm.disableDropDownRangeOptions(max_values, minValue);
                            vm.validateDropDownInputs();
                        });

                    max_input.on('input', function () {
                        var maxValue = max_input.val();
                        vm.filter.max_price = maxValue;

                        document.getElementById('price_range2').innerHTML = '$' + maxValue;
                        document.getElementById('price_range2').setAttribute('value', maxValue);

                        // vm.disableDropDownRangeOptions(min_values, maxValue);
                        vm.validateDropDownInputs();
                    });

                    max_input.blur('input',
                        function () {
                            vm.toggleDropDown();
                        });

            },
            toggleDropDown() {
                if (this.validateDropDownInputs() &&
                    parseInt($('.investRange .freeformPrice .min_input').val()) > 0) {

                    // auto close if two values are valid
                    $('.investRange .dropdown-toggle').dropdown('toggle');
                }
            },
            validateDropDownInputs() {
                        var minValue = parseInt($('.investRange .freeformPrice .min_input').val());
                        var maxValue = parseInt($('.investRange .freeformPrice .max_input').val());

                        if (maxValue > 0 && minValue > 0 && maxValue < minValue) {
                            $('.investRange .freeformPrice .min_input').addClass('inputError');
                            $('.investRange .freeformPrice .max_input').addClass('inputError');

                            return false;
                        } else {
                            $('.investRange .freeformPrice .min_input').removeClass('inputError');
                            $('.investRange .freeformPrice .max_input').removeClass('inputError');


                            return true;
                        }
            },

        },
        mounted() {


            $('input[type=radio][name=type]').change(function () {
                var isa = this.value;

                var type = $("#cust_type");
                var type2 = $("#cust_type2");
                if (isa == 'Buyer & Seller') {
                    type.empty();
                    type.append('<option selected="">Type Of Buyer / Seller</option>' +
                        '<option value="First Time Home Buyer">First Time Home Buyer</option>' +
                        '<option value="Foreclosure Home Buyer">Foreclosure Home Buyer</option>' +
                        '<option value="Affordable Home Buyer">Affordable Home Buyer</option>' +
                        '<option value="Pre-development Home Buyer">Pre-development Home Buyer</option>' +
                        '<option value="Pre-construction condo Buyer">Pre-construction condo Buyer</option>' +
                        '<option value="Apartment/Condo Buyer">Apartment/Condo Buyer</option>' +
                        '<option value="Luxury Home Buyer">Luxury Home Buyer</option>' +
                        '<option value="Commercial Buyer">Commercial Buyer</option>' +
                        '<option value="First Time Home Seller">First Time Home Seller</option>' +
                        '<option value="Un-dedicated Home Seller">Un-dedicated Home Seller</option>' +
                        '<option value="Future Home Seller">Future Home Seller</option>');
                    type2.append('<option selected="">Type Of Buyer / Seller</option>' +
                        '<option value="First Time Home Buyer">First Time Home Buyer</option>' +
                        '<option value="Foreclosure Home Buyer">Foreclosure Home Buyer</option>' +
                        '<option value="Affordable Home Buyer">Affordable Home Buyer</option>' +
                        '<option value="Pre-development Home Buyer">Pre-development Home Buyer</option>' +
                        '<option value="Pre-construction condo Buyer">Pre-construction condo Buyer</option>' +
                        '<option value="Apartment/Condo Buyer">Apartment/Condo Buyer</option>' +
                        '<option value="Luxury Home Buyer">Luxury Home Buyer</option>' +
                        '<option value="Commercial Buyer">Commercial Buyer</option>' +
                        '<option value="First Time Home Seller">First Time Home Seller</option>' +
                        '<option value="Un-dedicated Home Seller">Un-dedicated Home Seller</option>' +
                        '<option value="Future Home Seller">Future Home Seller</option>');
                } else if (isa == 'Buyer') {
                    type.empty();
                    type.append('<option selected="">Type Of Buyer / Seller</option>' +
                        '<option value="First Time Home Buyer">First Time Home Buyer</option>' +
                        '<option value="Foreclosure Home Buyer">Foreclosure Home Buyer</option>' +
                        '<option value="Affordable Home Buyer">Affordable Home Buyer</option>' +
                        '<option value="Pre-development Home Buyer">Pre-development Home Buyer</option>' +
                        '<option value="Pre-construction condo Buyer">Pre-construction condo Buyer</option>' +
                        '<option value="Apartment/Condo Buyer">Apartment/Condo Buyer</option>' +
                        '<option value="Luxury Home Buyer">Luxury Home Buyer</option>' +
                        '<option value="Commercial Buyer">Commercial Buyer</option>');
                    type2.append('<option selected="">Type Of Buyer / Seller</option>' +
                        '<option value="First Time Home Buyer">First Time Home Buyer</option>' +
                        '<option value="Foreclosure Home Buyer">Foreclosure Home Buyer</option>' +
                        '<option value="Affordable Home Buyer">Affordable Home Buyer</option>' +
                        '<option value="Pre-development Home Buyer">Pre-development Home Buyer</option>' +
                        '<option value="Pre-construction condo Buyer">Pre-construction condo Buyer</option>' +
                        '<option value="Apartment/Condo Buyer">Apartment/Condo Buyer</option>' +
                        '<option value="Luxury Home Buyer">Luxury Home Buyer</option>' +
                        '<option value="Commercial Buyer">Commercial Buyer</option>');
                } else if (isa == 'Seller') {
                    type.empty();
                    type.append('<option selected="">Type Of Buyer / Seller</option>' +
                        '<option value="First Time Home Seller">First Time Home Seller</option>' +
                        '<option value="Dedicated Home Seller">Dedicated Home Seller</option>' +
                        '<option value="Un-dedicated Home Seller">Un-dedicated Home Seller</option>' +
                        '<option value="Future Home Seller">Future Home Seller</option>');
                    type2.append('<option selected="">Type Of Buyer / Seller</option>' +
                        '<option value="First Time Home Seller">First Time Home Seller</option>' +
                        '<option value="Dedicated Home Seller">Dedicated Home Seller</option>' +
                        '<option value="Un-dedicated Home Seller">Un-dedicated Home Seller</option>' +
                        '<option value="Future Home Seller">Future Home Seller</option>');
                } else if (isa == 'Renter') {
                    type.empty();
                    type.append('<option selected="">Type Of Buyer / Seller</option>' +
                        '<option value="6 Months Lease">6 Months Lease</option>' +
                        '<option value="1 Year Lease">1 Year Lease</option>' +
                        '<option value="1+ Year Lease">1+ Year Lease</option>' +
                        '<option value="Non Contract Lease">Non Contract Lease</option>');
                    type2.append('<option selected="">Type Of Buyer / Seller</option>' +
                        '<option value="6 Months Lease">6 Months Lease</option>' +
                        '<option value="1 Year Lease">1 Year Lease</option>' +
                        '<option value="1+ Year Lease">1+ Year Lease</option>' +
                        '<option value="Non Contract Lease">Non Contract Lease</option>');
                }

            });
            var vm = this;
            vm.setuinvestRangeDropDownList(
        $('.investRange .min_value'),
        $('.investRange .max_value'),
        $('.investRange .freeformPrice .min_input'),
        $('.investRange .freeformPrice .max_input'),
        $('.investRange .btnClear'),
        $('.investRange .dropdown-toggle'));
        }
    }
</script>

