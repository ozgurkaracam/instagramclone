<template>
    <a href="#" class="btn btn-primary" v-on:click="toggle">{{ getText }}</a>
</template>

<script>
    import axios from 'axios';
    export default {
        data(){
            return {
                text:"Follow This User",
                // status:false,
            }
        },
        props:['following','follower','status'],
        methods:{

            toggle(){
              if(this.status==false){
                  axios.post('/'+this.follower+'/follow',this.following)
                  .then(res=> {
                      this.status=!this.status;
                      console.log(res);
                  })
                  .catch(err=>{
                      if(err.response.status==401)
                          window.location('/login');
                      window.location('login');
                  });
              }
              else{
                  axios.post('/'+this.follower+'/unfollow',this.following)
                      .then(res=> {
                          this.status=!this.status;
                          console.log(res);
                      })
                      .catch(err=>{
                          if(err.response.status==401)
                              window.location('/login');
                          window.location('login');
                      });
              }


            }

        },
        name:'FollowButton',
        computed:{
            getText(){
                return this.status==true ? "Unfollow" : "Follow";
            },
        }

    }
</script>
