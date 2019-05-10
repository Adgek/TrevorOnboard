<!-- This is the main component for the survey. It will
     eventually house all of the vue components for buttons and pages etc. 
-->

<template>
    <!-- Main div for app -->
        <div id="app"  >

            <!-- Navbar at the top of screen TODO: centre it! -->       
            <div class="text-center" id="top">

                <b-navbar class="header bottom-pad" type="dark" variant="info" fixed="top">

                    <b-navbar-brand href="#">Check In</b-navbar-brand>

                </b-navbar>

            </div>

            <!-- Used vuetify for some cool travelling between 'pages' -->
            <v-app>
           
                <v-content>

                    <v-container class="top-padding">
                       
                        <br>

                        <v-stepper v-model="step" vertical > <!-- Scroll to top is working after clicking 'Previous' and 'Next' -->

                            <!-- total pages with headers - used to step back and forth -->
                            <!-- TODO: template based on total pages -->
                            <v-stepper-header> Check In

                                <v-stepper-step step="1" :complete="step > 1">
                                 

                                </v-stepper-step>

                                <v-divider></v-divider>

                            </v-stepper-header>
                            
                            <!-- Introduction -->
                            <v-stepper-content step="1">

                                

                            </v-stepper-content>

                        </v-stepper>

                        <!-- Basic progress bar. Just a placeholder, for now -->
                        <v-progress-linear v-model="progressBarPercentage"></v-progress-linear>

                    </v-container>

                </v-content>
                
            </v-app>

            <br/><br/>

            <!-- Debugging survey object -->
        </div>   
</template>

<script>

    //This vue will simply hold the main common features of the 
    //survey i.e. => progres bar, next/prev buttons and the main header.

    export default {

        data: ()=>({
                
                progressBarPercentage: 10,
                step: 1
                
            })
    }

</script>