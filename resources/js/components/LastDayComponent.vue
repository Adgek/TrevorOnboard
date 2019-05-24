<template>
    
  <div class="grey-background ">
    
   

      
    <div class="container">
         <h3 class="heading-3-montserrat-left-blac">{{title}}</h3>
      
      <div class="card">
        
        <div class="container">
          <div class="row">
                        
            <div class="col">
                
                <div class="heading-3-bold-montserrat-left">
                    <p>
                      <v-icon>fa-stopwatch</v-icon> {{discipline}}
                    </p> 
                </div>
                    
            </div>
    
            <div class="col">
                <div class="heading-3-bold-montserrat-cent ">
                    {{location}}
                </div>
            </div>

            <div class="col">
                <div class="heading-3-bold-montserrat-righ ">
                    {{date}}
                </div>
            </div>

        
          </div>

          <div class="row">
            <!-- For these two check box icons below,
            eventually can just do an if statement to get the
            appropriate icon (completed vs. not) -->
            <div class="col text-center caption-montserrat-center-black ">
              <v-icon>fa-check-circle</v-icon> Check In
            </div>
      
            <div class="col text-center caption-montserrat-center-black ">
              <v-icon>fa-check-circle</v-icon>Check Out
            </div>

          </div>
          <v-divider></v-divider>
          <div class="row">
            <div class="col">
              <div class="card-headings-montserrat-left-black ">
                Insights
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col top-padding-sml heading-4-montserrat-center-black-left">
              My focus today was...
      
            </div>
          </div>

          <div class="row">

            <div class="col paragraph">
              {{lastDay.focus_today_answer}}
          
            </div>
          </div>
          <div class="row">
            <div class="col top-padding-sml heading-4-montserrat-center-black-left">
              To be a better ski racer I can...

            </div>
          </div>
          
          <div class="row">
            <div class="col paragraph">
              {{lastDay.better_today_answer}}
              

            </div>
          </div>

        </div>
          
      </div>
    </div>  
  </div>

  

</template>

<script>

export default {

  data: ()=> ({

    date: null //parsed date to get correct date format from date structure
  
  }),

  mounted() {

      this.date = this.lastDay.date;
      
       
  },

  props: {

    lastDay : {},
    title: {
      
      type: String,
      default: 'Last Day'
    
    },

    discipline: {
      type: String,
      default: 'SL'
    },

    location: {
    
      type: String,
      default: 'Chicopee'
    
    }
  },

  
  
    
}

</script>