<div class="modal-mask half-modal cpm-task-modal"  v-show="show" transition="modal">
    <div class="modal-wrapper" @click.prevent="closeTaskModal" >
        <div class="modal-container"  :style="modalwide">
            <span class="close-vue-modal"><a class=""  @click=""><span class="dashicons dashicons-no"></span></a></span>


            <div class="modal-body cpm-todolists " @click.stop=""   >
                <div class="cpm-col-12 cpm-todo " >
                    <div class="cpm-modal-conetnt  ">
                        <h3>
                            <input class="" type="checkbox" v-model="task.completed" checked="{{task.completed==1}}" @click.prevent="checktoggeltask(task, list)">
                            {{task.post_title}}
                        </h3>


                        <div class="task-details ">
                            <p v-if="!compiled_content">Loading...</p>
                            <p>{{{ compiled_content }}}</p>

                            <span class="cpm-lock" v-show="task.task_privacy">{{text.privet_task}}</span>
                            <span> <?php do_action( 'cpm_task_extra_partial' ); ?> </span>

                            <span  v-if="task.completed==0">
                                <user_show_list
                                    :users="task.assigned_to"
                                    ></user_show_list>
                                <span class="{{task.date_css_class}}"> {{{task.date_show}}} </span>

                            </span>

                            <span class="">{{task.comment_count}} {{task.comment_count | pluralize  text.comment }} </span>


                            <div class="clearfix cpm-clear"></div>
                        </div>
                        <hr/>

                        <div class="cpm-todo-wrap clearfix">
                            <div class="cpm-todo-content" >

                                <partial name="hook_cpm_task_single_after"></partial>
                            </div>



                            <comment_warp_task :comments="comments" :task="task" :pree_init_data="pree_init_data" :formid="'task_popup'" :uploderid="'tc'"></comment_warp_task>
                        </div>
                        <br/>
                        <br/>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix" ></div>
        </div>

    </div>
</div>


