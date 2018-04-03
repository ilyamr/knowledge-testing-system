<div id="app" data-id="<?=$topic->id;?>">
    <div v-if="isReady">
        <div class="row">
            <div class="small-12 columns">
                <div style="padding: 2em;">
                    <div class="button" @click="showModal = true">Add new question</div>
                </div>
            </div>
        </div>
        <ul class="all-items">
            <li class="row" v-for="item in items" id="row-{{$index}}">
                <div class="medium-1 columns">
                    <span class="number">{{$index + 1}}</span>
                </div>
                <div class="medium-8 columns"><span class="text">{{item.question}}
                <span class="description" v-if="item.type != 'text' && item.answers.length > 0">({{item.answers.length}} варіанти)</span>
                        <!-- <span class="description" v-else></span> -->
                </span></div>
                <div class="medium-3 columns item-control">
                    <span class="edit" @click="edit($index)">edit</span> | <span class="delete" @click="delete(item)">delete</span>
                </div>
            </li>
        </ul>


        <div class="modal-mask" v-show="showModal" transition="modal">
            <div id="question-form" class="question-form-modal">
                <div class="question-form">
                    <div class="modal-header">
                        <slot name="header"></slot>
                    </div>
                    <div class="frm-grp">
                        <div class="small-12 columns lbl">
                            Питання
                        </div>
                        <div class="small-12 columns">
                            <textarea rows="5" v-model="item.question"></textarea>
                        </div>
                    </div>
                    <div class="frm-grp">
                        <div class="small-12 columns lbl">
                            Тип тесту
                        </div>
                        <div class="small-12 columns">
                            <select v-model="item.type">
                                <option value='single'>1 правильна відповідь</option>
                                <option value='multi'>Багато правильних відповідей</option>
                                <option value='text'>Текстова відповідь</option>
                            </select>
                        </div>
                    </div>
                    <div class="frm-grp">
                        <div class="small-12 columns lbl">
                            Варіанти <span class="description">(помітьте правильні, чи введіть текст)</span>
                        </div>
                        <div class="small-12 columns">
                            <div v-if="item.type == 'single' || item.type == 'multi'" class="row"
                                 v-for="answer in item.answers">
                                <div class="small-1 columns">
                                    <input v-if="item.type == 'single'" value="{{$index}}" v-model="item.correct[0]"
                                           type="radio"/>
                                    <input v-else value="{{$index}}" name="correct[]" v-model="item.correct" type="checkbox"/>
                                </div>
                                <div class="small-8 columns">
                                    <span v-if="utils.editingAnswer !== $index">{{answer}}</span>
                                    <input v-else type="text" v-model="utils.answer"
                                           @blur="doneEditAnswer()"
                                           @keyup.enter="doneEditAnswer()"
                                           @keyup.esc="cancelEditAnswer()">
                                </div>
                                <div class="small-3 columns item-control">
                                    <span class="edit" @click="editAnswer($index)">edit</span> | <span
                                        class="delete" @click="deleteAnswer(answer)">delete</span></div>
                            </div>
                            <div v-if="item.type == 'single' || item.type == 'multi'" class="row answer-form">
                                <div class="small-1 columns">&nbsp;</div>
                                <div class="small-8 columns">
                                    <label><input type="text" @keyup.enter="addAnswer()" v-model="answerModal"
                                                  placeholder="Введіть варіант"/></label>
                                </div>
                                <div class="small-3 columns item-control"><span class="edit"
                                                                                @click="addAnswer()">add</span>
                                </div>
                            </div>
                            <div v-else class="row answer-form">
                                <div class="small-12 columns">
                                    <label><input type="text" v-model="item.answers[0]"
                                                  placeholder="Введіть варіант"/></label>
                                </div>
                            </div>
                        </div>
                        <div style="clear:both"></div>
                        <div class="btn-holder">
                            <div class="button" @click="submitQuestion()">Save & submit</div>
                            <a class="secondary button" @click="showModal = false" href="#">Cancel</a></div>
                    </div>
                </div>
            </div>
        </div>

        <div id="question-edit-form" class="row" style="display:none">
            <div style="clear:both"></div>
            <div class="medium-1 columns">&nbsp;</div>
            <div class="medium-8 columns" style="padding:0">
                <div class="question-form">
                    <div class="frm-grp">
                        <div class="small-12 columns lbl">
                            Питання
                        </div>
                        <div class="small-12 columns">
                            <textarea rows="5" v-model="item.question"></textarea>
                        </div>
                    </div>
                    <div class="frm-grp">
                        <div class="small-12 columns lbl">
                            Тип тесту
                        </div>
                        <div class="small-12 columns">
                            <select id="test-type" v-model="item.type">
                                <option value='single'>1 правильна відповідь</option>
                                <option value='multi'>Багато правильних відповідей</option>
                                <option value='text'>Текстова відповідь</option>
                            </select>
                        </div>
                    </div>
                    <div class="frm-grp">
                        <div class="small-12 columns lbl">
                            Варіанти <span class="description">(помітьте правильні, чи введіть текст)</span>
                        </div>
                        <div class="small-12 columns">
                            <div v-if="item.type == 'single' || item.type == 'multi'" class="row"
                                 v-for="answer in item.answers">
                                <div class="small-1 columns">
                                    <input v-if="item.type == 'single'" value="{{$index}}" v-model="item.correct[0]"
                                           type="radio"/>
                                    <input v-else value="{{$index}}" v-model="item.correct" type="checkbox"/>
                                </div>
                                <div class="small-8 columns">
                                    <span v-if="utils.editingAnswer !== $index">{{answer}}</span>
                                    <input v-else type="text" v-model="utils.answer"
                                           @blur="doneEditAnswer()"
                                           @keyup.enter="doneEditAnswer()"
                                           @keyup.esc="cancelEditAnswer()">
                                </div>
                                <div class="small-3 columns item-control">
                                    <span class="edit" @click="editAnswer($index)">edit</span> | <span
                                        class="delete" @click="deleteAnswer(answer)">delete</span></div>
                            </div>

                            <div v-if="item.type == 'single' || item.type == 'multi'" class="row answer-form">
                                <div class="small-1 columns">&nbsp;</div>
                                <div class="small-8 columns">
                                    <label><input type="text" @keyup.enter="addAnswer()" v-model="answerModal"
                                                  placeholder="Введіть варіант"/></label>
                                </div>
                                <div class="small-3 columns item-control"><span class="edit"
                                                                                @click="addAnswer()">add</span>
                                </div>
                            </div>
                            <div v-else class="row answer-form">
                                <div class="small-12 columns">
                                    <label><input type="text" v-model="item.answers[0]"
                                                  placeholder="Введіть варіант"/></label>
                                </div>
                            </div>
                        </div>
                        <div style="clear:both"></div>
                    </div>

                    <div class="btn-holder">
                        <div class="button" @click="saveEdit()">Save & submit</div>
                        <div class="secondary button" @click="closeEditForm()">Cancel</div></div>
                </div>
            </div>
            <div class="medium-3 columns">&nbsp;</div>
        </div>
    </div>
    <div v-else class="loader">Loading...</div>
</div>