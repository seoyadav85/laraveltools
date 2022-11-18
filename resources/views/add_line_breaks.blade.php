@extends('layouts.front')
@section('meta_keywords')
  <title>{{$data->meta_title}}</title>
  <meta name="description" content="{{$data->meta_description}}">
  <meta name="keywords" content="{{$data->meta_keyword}}">
@endsection
@section('content')
<!-- Contant Start -->
<div class="content">
   <section class="sort-text-wrap">
      <div class="container">
         <div class="sort-text-content">
            <div class="sort-text-heading">
               <h4>Add Line Breaks</h4>
               <div class="sort-text-switch">
                  <div class="switch-wrap">
                    <div class="w-100 clear margin-y">
                    <div class="w-50 left spacer-l xs-100 main xs-spacer-n">
                        <div id="text_occ" style="min-width:550px">
                        <label for="replace">Add Line Breaks</label>
                        <select id="before_after" class="input-sm xs-right" style="width:120px">
                            <option value="1">before</option>
                            <option value="2">instead of</option>
                            <option value="3" selected="">after</option>
                        </select>

                            <label for="replace">This Text</label> 
                            <input id="txt" class="margin-0" spellcheck="false" style="font-family: Arial; font-size: 16px;" placeholder="A">
                        </div>
                        <div id="char_position" style="display:none">
                            <label for="replace">Add Lines breaks every</label> 
                            <input type="number" id="charLength" class="margin-0" spellcheck="false" style="font-family: Arial; font-size: 16px;">character/s.
                        </div>                    
                    </div>
                </div>
                  </div>
                  <div class="sort-select">
                     <span>Sort</span>
                     <div class="sort-select-inner">
                        <select id="settings">
                            <option value="1">Text occurrence</option>
                            <option value="2">Character position</option>
                            <option value="3">Add 1 line</option>
                        </select>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row sort-textbox-row">
               <div class="col-lg-6 sort-textbox-col">
                  <div class="sort-textbox">
                     <div class="sort-textbox-heading">
                        <h5>Input</h5>
                     </div>
                     <div class="textarea-wrap">
                        <ul class="textarea-header">
                           <li>
                              <div class="dropdown file-dropdown">
                                 <button class="btn btn-secondary dropdown-toggle" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                 File
                                 </button>
                                 <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <input type="file" id="file_upload" style="display: none"/>
                                    <li>
                                       <a class="dropdown-item" href="javascript:void(0)" id="file_new">
                                       <i class="fa fa-file-o" aria-hidden="true"></i>
                                       New Document
                                       </a>
                                    </li>
                                    <li>
                                       <a class="dropdown-item" href="javascript:void(0)" id="open_file">
                                       <i class="fa fa-eye" aria-hidden="true"></i>Open
                                       </a>
                                    </li>
                                    <li>
                                       <a class="dropdown-item" href="javascript:void(0)" id="file_download">
                                       <i class="fa fa-floppy-o" aria-hidden="true"></i>Save As
                                       </a>
                                    </li>
                                    <li>
                                       <a class="dropdown-item" href="javascript:void(0)" id="file_print">
                                       <i class="fa fa-print" aria-hidden="true"></i>Print</a>
                                    </li>
                                 </ul>
                              </div>
                           </li>
                            <li>
                              <div class="custom-select">
                                 <select name="fontsize" id="fontsize">
                                    <option value="" disabled>font</option>
                                    <option value="8">8px</option>
                                    <option value="10">10px</option>
                                    <option value="12">12px</option>
                                    <option value="14" selected="selected">14px</option>
                                    <option value="16">16px</option>
                                    <option value="18">18px</option>
                                    <option value="24">24px</option>
                                    <option value="36">36px</option>
                                    <option value="48">48px</option>
                                    <option value="56">56px</option>
                                    <option value="72">72px</option>
                                 </select>
                              </div>
                           </li>
                           <li>
                              <button type="button" id="btnBold">
                                <img src="{{asset('public/images/bold.svg')}}" alt="">
                              </button>
                              <button type="button" id="btnItalic">
                                <img src="{{asset('public/images/italic.svg')}}" alt="">
                            </button>
                            <button type="button" id="btnUnderLine">
                                <img src="{{asset('public/images/underline.svg')}}" alt="">
                            </button>
                            <button type="button" id="btnStrike">
                                <img src="{{asset('public/images/strikethrough.svg')}}"
                                 alt="">
                            </button>
                           </li>
                           <li>
                            <button type="button" id="btnLeft">
                                <img src="{{asset('public/images/align-left.svg')}}" alt="">
                            </button>
                            <button type="button" id="btnCenter">
                                <img src="{{asset('public/images/align-center.svg')}}"
                                 alt="">
                            </button>
                            <button type="button" id="btnRight">
                                <img src="{{asset('public/images/align-right.svg')}}" alt="">
                            </button>
                           </li>
                           <li>
                            <button type="button" id="btnNumber">
                                <img src="{{asset('public/images/numbered-list.png')}}"
                                 alt="">
                            </button>
                            <button type="button" id="btnBullet">
                                <img src="{{asset('public/images/bulleted-list.png')}}"
                                 alt="">
                             </button>
                           </li>
                           <li>
                            <button type="button" id="btnUndo">
                                <img src="{{asset('public/images/undo.svg')}}" alt="">
                            </button>
                            <button type="button" id="btnRedo">
                                <img src="{{asset('public/images/reundo.png')}}" alt="">
                            </button>
                           </li>
                        </ul>
                        <textarea class="form-control textbox" cols="50" id="txtArea" spellcheck="false"></textarea>
                     </div>
                  </div>
               </div>


               <div class="col-lg-6 sort-textbox-col">
                  <div class="sort-textbox">
                     <div class="sort-textbox-heading">
                        <h5>Output</h5>
                     </div>
                     <div class="textarea-wrap">
                        <ul class="textarea-header">
                           <li>
                              <div class="dropdown file-dropdown">
                                 <button class="btn btn-secondary dropdown-toggle" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                 File
                                 </button>
                                 <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <input type="file" id="file_upload1" style="display: none"/>
                                    <li>
                                       <a class="dropdown-item" href="javascript:void(0)" id="file_new1">
                                       <i class="fa fa-file-o" aria-hidden="true"></i>
                                       New Document
                                       </a>
                                    </li>
                                    <li>
                                       <a class="dropdown-item" href="javascript:void(0)" id="open_file1">
                                       <i class="fa fa-eye" aria-hidden="true"></i>Open
                                       </a>
                                    </li>
                                    <li>
                                       <a class="dropdown-item" href="javascript:void(0)" id="file_download1">
                                       <i class="fa fa-floppy-o" aria-hidden="true"></i>Save As
                                       </a>
                                    </li>
                                    <li>
                                       <a class="dropdown-item" href="javascript:void(0)" id="file_print1">
                                       <i class="fa fa-print" aria-hidden="true"></i>Print</a>
                                    </li>
                                 </ul>
                              </div>
                           </li>
                           <li>
                              <div class="custom-select">
                                 <select name="fontsize1" id="fontsize1">
                                    <option value="" disabled>font</option>
                                    <option value="8">8px</option>
                                    <option value="10">10px</option>
                                    <option value="12">12px</option>
                                    <option value="14" selected="selected">14px</option>
                                    <option value="16">16px</option>
                                    <option value="18">18px</option>
                                    <option value="24">24px</option>
                                    <option value="36">36px</option>
                                    <option value="48">48px</option>
                                    <option value="56">56px</option>
                                    <option value="72">72px</option>
                                 </select>
                              </div>
                           </li>
                           <li>
                              <button type="button" id="btnBold1">
                                <img src="{{asset('public/images/bold.svg')}}" alt="">
                              </button>
                              <button type="button" id="btnItalic1">
                                <img src="{{asset('public/images/italic.svg')}}" alt="">
                            </button>
                            <button type="button" id="btnUnderLine1">
                                <img src="{{asset('public/images/underline.svg')}}" alt="">
                            </button>
                            <button type="button" id="btnStrike1">
                                <img src="{{asset('public/images/strikethrough.svg')}}"
                                 alt="">
                            </button>
                           </li>
                           <li>
                            <button type="button" id="btnLeft1">
                                <img src="{{asset('public/images/align-left.svg')}}" alt="">
                            </button>
                            <button type="button" id="btnCenter1">
                                <img src="{{asset('public/images/align-center.svg')}}"
                                 alt="">
                            </button>
                            <button type="button" id="btnRight1">
                                <img src="{{asset('public/images/align-right.svg')}}" alt="">
                            </button>
                           </li>
                           <li>
                            <button type="button" id="btnNumber1">
                                <img src="{{asset('public/images/numbered-list.png')}}"
                                 alt="">
                            </button>
                            <button type="button" id="btnBullet1">
                                <img src="{{asset('public/images/bulleted-list.png')}}"
                                 alt="">
                             </button>
                           </li>
                           <li>
                            <button type="button" id="btnUndo1">
                                <img src="{{asset('public/images/undo.svg')}}" alt="">
                            </button>
                            <button type="button" id="btnRedo1">
                                <img src="{{asset('public/images/reundo.png')}}" alt="">
                            </button>
                           </li>
                        </ul>
                        <textarea class="form-control textbox" cols="50" id="txtArea1" spellcheck="false"></textarea>
                     </div>
                  </div>                  
               </div>
            </div>
            <div class="sort-text-btn">
               <button type="button" class="copy-btn">
               <img src="{{asset('public/images/copy-icon.svg')}}" alt="">
               Copy</button>
               <ul class="sort-clear-btn">
                  <button type="button" class="sort-btn" id="btnApply">Apply</button>
                  <button id="clearAll" type="button">Clear</button>
               </ul>
            </div>
         </div>
      </div>
   </section>
   <section class="about-wrap">
      {!! $data->description !!}
   </section>
</div>
<!-- Contant End -->
<script type="text/javascript" src="{{asset('/public/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/public/js/common.js')}}"></script>
<script type="text/javascript" src="{{asset('/public/js/add_line_breaks.js')}}"></script>
<script src="{{asset('public/js/front/UndoRedo.js')}}"></script>
<script type="text/javascript">
    const txtHistory = new window.UndoRedojs(5);
    const textarea = document.querySelector("#txtArea");
    textarea.addEventListener('input', () => { 
        if (txtHistory.current() !== textarea.value) {
            if ((textarea.value.length - txtHistory.current().length) > 1 || (textarea.value.length - txtHistory.current().length) < -1 || (textarea.value.length - txtHistory.current().length) === 0) {
                txtHistory.record(textarea.value, true)
            } else {
                txtHistory.record(textarea.value)
            }
        }
    });
    setTimeout(() => {
        if (textarea.value) txtHistory.record(textarea.value, true)
    }, 100)
    document.querySelector("#btnUndo").addEventListener('click', () => {
        if (txtHistory.undo(true) !== undefined) {
            textarea.value = txtHistory.undo()
        }
    });
    document.querySelector("#btnRedo").addEventListener('click', () => {
        if (txtHistory.redo(true) !== undefined) {
            textarea.value = txtHistory.redo()
        }
    });



    const txtHistory1 = new window.UndoRedojs(5);
    const textarea1 = document.querySelector("#txtArea1");
    textarea1.addEventListener('input', () => { 
        if (txtHistory1.current() !== textarea1.value) {
            if ((textarea1.value.length - txtHistory1.current().length) > 1 || (textarea1.value.length - txtHistory1.current().length) < -1 || (textarea1.value.length - txtHistory1.current().length) === 0) {
                txtHistory1.record(textarea1.value, true)
            } else {
                txtHistory1.record(textarea1.value)
            }
        }
    });
    setTimeout(() => {
        if (textarea1.value) txtHistory1.record(textarea1.value, true)
    }, 100)
    document.querySelector("#btnUndo1").addEventListener('click', () => {
        if (txtHistory1.undo(true) !== undefined) {
            textarea1.value = txtHistory1.undo()
        }
    });
    document.querySelector("#btnRedo1").addEventListener('click', () => {
        if (txtHistory1.redo(true) !== undefined) {
            textarea1.value = txtHistory1.redo()
        }
    });
</script>

@endsection