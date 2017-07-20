<style>
.pagelist {padding:5px; text-align:center;}
.pagelist span,.pagelist a{ border-radius:3px; border:1px solid #dfdfdf;display:inline-block; padding:5px 12px;}
.pagelist a{ margin:0 4px;}
.pagelist span.current{ background:#09F; color:#FFF; border-color:#09F; margin:0 2px;}
.pagelist a:hover{background:#09F; color:#FFF; border-color:#09F; }
.pagelist label{ padding-left:5px; color:#999;}
.pagelist label b{color:red; font-weight:normal; margin:0 3px;}
.popup 
{
  display: none;
  list-style-type: none; 
  overflow: hidden;
  position: absolute;
}
/*显示弹出菜单*/
.popupmenu li:hover ul {
  display: block;
  z-index:2;
  /*left:840px;*/
}
.popupmenu li ul:hover {
  display: block;
  z-index:2;
  /*left:840px;*/
}
</style>

<div class="pagelist">
@if ($paginator->hasPages())
    <ul class="popupmenu">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a href="{{ $paginator->url(1) }}" class="disabled">首页</a>
        @else

            <a href="{{ $paginator->url(1) }}" class="disabled">首页</a>

            <a href="{{ $paginator->previousPageUrl() }}" rel="prev">上一页</a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next">下一页</a>
            <a href="{{ $paginator->url($max) }}" class="disabled">尾页</a>
        @else
            <a href="{{ $paginator->url($max) }}" class="disabled">尾页</a>
        @endif
    </ul>
@endif
</div>