<div class="main-menu">
              <ul class="header-menu-list">
                {volist name="$menu" id="vo"}
                <li class="menu-item-list-children"><a href="{if condition="$vo['link'] neq '' "}{$vo['link']}{else /}{:url('news/index','catid='.$vo['id'])}{/if}">{$vo.title}</a></li>
                {/volist}
              </ul>
            </div>