
<ul  class="cpm-todos cpm-todolist-content" >

    <li v-for="task in pendingList ">

        <div class="cpm-todo-wrap clearfix">
            <div class="cpm-todo-content" >

                <div>
                    <div class="cpm-col-7">


                        <span class="cpm-spinner"></span>

                        <input class="" type="checkbox" checked="{{task.completed==1}}" @click.prevent="checktoggeltask(task, list)">

                        <span class="cpm-todo-text"> <a href="#" @click.prevent="taskDetails(task, list)"> {{task.post_title}} </a> </span>
                        <span class="cpm-lock" v-show="task.task_privacy"></span>
                        <!-- <span> <partial name="hook_cpm_task_extra"></partial> </span> -->
                        <span> <?php do_action( 'cpm_task_extra_partial' ); ?> </span>

                        <span  v-if="task.completed==0">
                            <user_show_list
                                :users="task.assigned_to"
                                ></user_show_list>
                            <span class="{{task.date_css_class}}"> {{{task.date_show}}} </span>

                        </span>


                    </div>

                    <div class="cpm-col-4">

                        <span class="comments column-comments post-com-count-wrapper">
                            <a href="#" @click.prevent="taskDetails(task, list)"  class="post-com-count post-com-count-approved">
                                <span class="comment-count-approved" aria-hidden="true">{{task.comment_count}}</span>
                            </a>
                        </span>


                        <partial name="hook_cpm_task_column"></partial>

                    </div>

                    <div class="cpm-col-1 cpm-todo-action-right cpm-last-col">


                        <a href="#" class="cpm-todo-delete" @click.prevent="deleteTask(tasks,task)" ><span class="dashicons dashicons-trash"></span></a>


                        <a href="#" @click.prevent="editTask(task)" class=""><span class="dashicons dashicons-edit"></span></a>

                    </div>
                    <div class="clearfix"></div>


                </div>
                <div class="" v-if="task.edit_mode" >

                    <taskform
                        :list="list"
                        :task="task"
                        :text="text"
                        :current_project="current_project"
                        :form_action="'cpm_task_update'"
                        :wp_nonce="wp_nonce"
                        :pree_init_data="pree_init_data"
                        :extra_fields="task.extra_data"
                        :tfid="'ttl-'+task.ID"
                        ></taskform>

                </div>
                <div class="cpm-col-12">

                    <partial name="hook_cpm_task_single_after"></partial>

                </div>

            </div>



        </div>
    </li>
</ul>
<div v-if="list.full_view_mode">
    <ul  class="cpm-todos cpm-todolist-content" >
        <li v-for="task in completeList " >

            <div class="cpm-todo-wrap clearfix">
                <div class="cpm-todo-content" >

                    <div>
                        <div class="cpm-col-7">


                            <span class="cpm-spinner"></span>

                            <input class="" type="checkbox" checked="{{task.completed==1}}" @click.prevent="checktoggeltask(task, list)">

                            <span class="cpm-todo-text"> <a href="#" @click.prevent="taskDetails(task, list)"> {{task.post_title}} </a> </span>
                            <span class="cpm-lock" v-show="task.task_privacy"></span>
                            <span> <partial name="hook_cpm_task_extra"></partial> </span>
                            <span  v-if="task.completed==1"> {{text.completed_by}}
                                <user_show_list
                                    :users="task.completed_by"
                                    ></user_show_list>  {{text.on}}

                                <span class="cpm-completed-by"> {{{task.date_show_complete}}} </span>

                            </span>


                        </div>

                        <div class="cpm-col-4">

                            <span class="comments column-comments post-com-count-wrapper">
                                <a href="#" @click.prevent="taskDetails(task, list)" class="post-com-count post-com-count-approved">
                                    <span class="comment-count-approved" aria-hidden="true">{{task.comment_count}}</span>
                                </a>
                            </span>


                            <partial name="hook_cpm_task_column"></partial>

                        </div>

                        <div class="cpm-col-1 cpm-todo-action-right cpm-last-col">


                            <a href="#" class="cpm-todo-delete" @click.prevent="deleteTask(tasks,task)" ><span class="dashicons dashicons-trash"></span></a>
                        </div>
                        <div class="clearfix"></div>


                    </div>

                    <div class="cpm-col-12">

                        <partial name="hook_cpm_task_single_after"></partial>

                    </div>

                </div>



            </div>
        </li>
    </ul>



</div>