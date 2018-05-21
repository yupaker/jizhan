<aside id="sidebar">
              <div class="widgets">
                <dl>
                  <dt><h3 class="red">定位</h3></dt>
                  <dd>
                    哏都的逗哏哏逗的都哏
                  </dd>
                </dl>
              </div>
              <div class="widgets">
                <dl>
                  <dt><h3 class="red">标签云</h3></dt>
                  <dd>
                    <div class="tagcloud">
                      {volist name="$tagslist" id="vo"}
                      <a href="{:url('news/index','tagname='.$vo['title'])}" title="{$vo.title}">{$vo.title} <em>({$vo.newsnum})</em></a>
                      {/volist}
                    </div>
                  </dd>
                </dl>
              </div>
              <div class="widgets">
                <dl>
                  <dt><h3 class="red">最新文章</h3></dt>
                  <dd>
                    <ul class="list">
                      {volist name="$news['new']" id="vo"}
                      <li class="list-bt fa"><a href="{:url('news/show','id='.$vo['id'])}" title="{$vo.title}">{$vo.title}</a></li>
                      {/volist}
                    </ul>
                  </dd>
                </dl>
              </div>
              <div class="widgets">
                <dl>
                  <dt><h3 class="green">热门文章</h3></dt>
                  <dd>
                    <ul class="list">
                      {volist name="$news['view']" id="vo"}
                      <li class="list-bt fa"><a href="{:url('news/show','id='.$vo['id'])}" title="{$vo.title}">{$vo.title}</a></li>
                      {/volist}
                    </ul>
                  </dd>
                </dl>
              </div>
              <div class="widgets">
                <dl>
                  <dt><h3 class="blue">推荐文章</h3></dt>
                  <dd>
                    <ul class="list">
                      {volist name="$news['hot']" id="vo"}
                      <li class="list-bt fa"><a href="{:url('news/show','id='.$vo['id'])}" title="{$vo.title}">{$vo.title}</a></li>
                      {/volist}
                    </ul>
                  </dd>
                </dl>
              </div>
            
            </aside>