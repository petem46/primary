<style>
    #venn div {
        width: 240px;
        height: 240px;
        border-radius: 50%;
        pointer-events: none;
        position: absolute;
    }

    #venn .innerw {
        left: 0px;
        top: 0px;
        overflow: hidden;
        position: absolute;
        /* border: solid; */
        z-index: 20;
        /* transform: translateZ(10px); */
        pointer-events: none;
    }

    #venn .innerw2 {
        margin-left: 0px;
        top: 0px;
        overflow: hidden;
        position: static;
        /* border: solid; */
        /* z-index: 20; */
        pointer-events: none;
    }

    #venn .innerw3 {
        margin-left: 170px;
        top: 0px;
        overflow: hidden;
        position: static;
        /* border: solid; */
        /* z-index: 20; */
        pointer-events: none;
    }

    #venn .inner {
        margin-left: -85px;
        margin-top: 130px;
        background-color: palegreen;
        z-index: 20;
        position: static;
        pointer-events: auto;
        padding-top: 20px;
    }

    #venn .inner:hover {
        background-color: green;
    }

    #venn .mwrap {
        position: absolute;
        overflow: hidden;
        pointer-events: none;
        z-index: 10;
    }
    #venn .mwrap2 {
        position: static;
        margin-left: 0px;
        margin-top: 0px;
        overflow: hidden;
        pointer-events: none;
    }
    #venn .mid {
        position: static;
        pointer-events: auto;
    }
    #venn #midaw1 {
        left: 0px;
        top: 0px;
    }
    #venn #mida {
        margin-left: 170px;
        margin-top: 0px;
    }
    #venn #mida div {
        padding-right: 170px;
        padding-top: 90px;
    }
    #venn #midbw1 {
        left: 170px;
        top: 0px;
    }
    #venn #midb {
        margin-left: -85px;
        margin-top: 130px;
    }
    #venn #midb div {
        padding-left: 120px;
        padding-top: 50px;
    }
    #venn #midcw1 {
        left: 85px;
        top: 130px;
    }
    #venn #midc {
        margin-left: -85px;
        margin-top: -130px;
    }
    #venn #midc div {
        padding-left: 50px;
        padding-top: 180px;
    }
    #venn .mid {
        background-color: lightblue;
        z-index: 15;
    }
    #venn .mid:hover {
        background-color: blue;
    }
    #venn #outer1 {
        left: 0px;
        top: 0px;
        padding-top: 80px;
        padding-right: 60px;
    }

    #venn #outer2 {
        left: 170px;
        top: 0px;
        padding-top: 80px;
        padding-left: 60px;
    }
    #venn #outer3 {
        left: 85px;
        top: 130px;
        padding-top: 140px;
    }
    #venn .outer {
        background-color: lightcoral;
        z-index: 1;
        pointer-events: auto;
    }
    #venn .outer:hover {
        background-color: red;
    }
</style>
<div id="venn" class="text-center">
    <div id="outer1" class="outer">
        {{$vov->venn_fte}}
    </div>
    <div id="outer2" class="outer">
        {{$vov->venn_send}}
    </div>
    <div id="outer3" class="outer">
        {{$vov->venn_pa}}
    </div>
    <div id="midaw1" class="mwrap">
        <div id="midaw2" class="mwrap2">
            <div id="mida" class="content mid">
                <div>{{$vov->venn_ftesend}}</div>
            </div>
        </div>
    </div>
    <div id="midbw1" class="mwrap">
        <div id="midbw2" class="mwrap2">
            <div id="midb" class="content mid">
                <div>{{$vov->venn_sendpa}}</div>
            </div>
        </div>
    </div>
    <div id="midcw1" class="mwrap">
        <div id="midcw2" class="mwrap2">
            <div id="midc" class="content mid">
                <div>{{$vov->venn_ftepa}}</div>
            </div>
        </div>
    </div>
    <div class="innerw">
        <div class="innerw2">
            <div class="innerw3">
                <div class="inner">
                    {{$vov->venn_ftesendpa}}
                </div>
            </div>
        </div>
    </div>
</div>
