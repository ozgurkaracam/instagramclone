<template>
    <div class="d-flex align-items-top">
        <div class="">
            <b>{{ likecount }}</b>
            <i class="far fa-heart fa-2x" v-on:click="likepost" v-bind:class="{ 'fas' : status==true}"></i>
        </div>
        <div class="ml-3">
            <b>{{ commentcount }}</b>
            <i class="far fa-comment fa-2x" click="window.location('/')"></i>
        </div>
    </div>
</template>
<script>
    import FontAwesome from '@fortawesome/fontawesome-free';
    import axios from 'axios';
    export default {
        data(){
            return {
                // status:false
            }
        },
        props:['likecount','commentcount','postid','status','userid'],
        methods: {
            likepost(){
                if(this.status == false ){
                    axios.post('/p/'+this.postid+'/like',this.userid)
                        .then(res=>{
                            this.likecount=parseInt(this.likecount)+1;
                        })
                        .then(res=>this.status=!this.status)
                        .catch(err=> console.log(err));


                }
                else{
                    axios.post('/p/'+this.postid+'/unlike',this.userid)
                        .then(res=>{
                            this.likecount=parseInt(this.likecount)-1;
                        })
                        .then(res=>this.status=!this.status)
                        .catch(err=> console.log(err));

                }

            }
        },
        name:'FollowButton'
    }
</script>
<style scoped>
    li:hover {
        cursor: help;
    }
</style>
