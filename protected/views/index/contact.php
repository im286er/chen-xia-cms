<div style="clear:both;"></div>		<div id="main" class="clearfix">
			
			<!-- grab the sidebar -->
						<div id="sidebar-wrap" class="clearfix">
	 
				 <div id="sticky" class="clearfix">
					<h2 class="sticky-title">Sticky Sidebar</h2>
															
					<div class="widget">			
					<div class="twitter-box">
						 <h2>I Tages</h2>
						 <ul class="tweet-scroll">
							 <li>
								 <?php foreach ($labelInfo as $key=>$l): ?>
							 	<a class="mytags" href="<?php echo $this->createUrl("index/intag",array('uid'=>$uid,'id'=>$l['id'])); ?>"><?php echo $l['label']; ?></a>
							 	<?php endforeach; ?>
							 
								 <!-- all固定写法 -->
							 	<a class="mytags" href="<?php echo $this->createUrl("index/intag",array('uid'=>$uid,'id'=>'all')); ?>">全部</a>
							 </li>
						 </ul>
						 <!-- 
						 <a class="tweets-more" href="#" target="_blank" title="twitter">More Tweets &rarr;</a>
						  -->
					</div>
			
					</div><div class="widget">
					<form action="<?php echo $this->createUrl("index/search"); ?>" class="search-form clearfix">
						<fieldset>
							<input type="hidden" name='uid' value="<?php echo $uid; ?>"/>
							<input type="text" class="search-form-input text" name="s" onfocus="if (this.value == 'search the site') {this.value = '';}" onblur="if (this.value == '') {this.value = 'search the site';}" value="search the site"/>
							<input type="submit" value="Go" class="submit" />
						</fieldset>
					</form></div>					
				</div><!-- sticky -->
							
			<div style="clear:both;"></div>				
								
			</div><!-- sidebar wrap -->			
			<div id="content" class="filter-posts">
				<!-- grab the posts -->
				
				<div data-id="post-216" data-type="" class="post-216 post clearfix project">
					<div class="box" >
						<div class="">
							<div class="frame" >
								<h2 class="entry-title"><a href="#" title="Contact">给我发私信</a></h2>
								
								<div class="okvideo"></div>																	
								<!-- <p>Say Something to ME</p> -->
								<div class="wpcf7" id="wpcf7-f1-p216-o1">
								
								<!-- 
								<form action="#" method="post" class="wpcf7-form">
								 -->
								 <?php $form = $this->beginWidget('CActiveForm',array('htmlOptions'=>array('class'=>'wpcf7-form'))); ?>
									<!-- 
									<div style="display: none;">
									<input type="hidden" name="_wpcf7" value="1" />
									<input type="hidden" name="_wpcf7_version" value="2.4.6" />
									<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f1-p216-o1" />
									</div>
									 -->
									 
									 <p style="color:red;font-family:'幼圆';font-weight:normal;">
									 <?php echo $form->error($contactModel,'message'); ?>
									 <?php echo $form->error($contactModel,'verify'); ?>
									 <?php 
									 		if(Yii::app()->user->hasFlash('contactstatus')){
												echo Yii::app()->user->getFlash('contactstatus');
											}
									 ?>
									 </p>
									 
									<p style="font-family:'幼圆';font-weight:normal;font-size:15px;">您的姓名(*)<br />
									    <span class="wpcf7-form-control-wrap your-name">
									    <!-- 
									    <input type="text" name="your-name" value="" class="wpcf7-text wpcf7-validates-as-required" size="40" />
									     -->
									     <?php echo $form->textField($contactModel,'tourist',array('style'=>'border:1px solid black;background:none;width:260px;height:23px;border-radius:7px;')); ?>
									    </span>
									 </p>
									<p style="font-family:'幼圆';font-weight:normal;font-size:15px;">您的邮箱(方便我联系您)<br />
									    <span class="wpcf7-form-control-wrap your-email">
									    <!-- 
									    <input type="text" name="your-email" value="" class="wpcf7-text wpcf7-validates-as-email wpcf7-validates-as-required" size="40" />
										-->
										<?php echo $form->textField($contactModel,'email',array('style'=>'border:1px solid black;background:none;width:260px;height:23px;border-radius:7px;')); ?>
										</span> 
									</p>
									<p style="font-family:'幼圆';font-weight:normal;font-size:15px;">主题<br />
									    <span class="wpcf7-form-control-wrap your-subject">
									    <!-- 
									    <input type="text" name="your-subject" value="" class="wpcf7-text" size="40" />
									     -->
									     <?php echo $form->textField($contactModel,'subject',array('style'=>'border:1px solid black;background:none;width:260px;height:23px;border-radius:7px;')); ?>
									    </span> 
									    </p>
									<p style="font-family:'幼圆';font-weight:normal;font-size:15px;">信息内容<br />
									    <span class="wpcf7-form-control-wrap your-message">
									    <!-- 
									    <textarea name="your-message" cols="40" rows="10"></textarea>
									     -->
									     <?php echo $form->textArea($contactModel,'message',array('cols'=>'40','rows'=>'10',"style"=>"resize:none;border:1px solid black;background:none;border-radius:7px;")); ?>
									    </span> 
									</p>
									
									<p>
									<?php echo $form->textField($contactModel,'verify',array('id'=>'email','size'=>'22','tabindex'=>'2','aria-required'=>'true','style'=>'border:1px solid black;background:none;width:200px;height:23px;border-radius:7px;display:block;float:left;margin-top:8px;')); ?>
									<?php 
										$this->widget('CCaptcha',array('showRefreshButton'=>false,'clickableImage'=>true,
										'imageOptions'=>array('alt'=>'点击换图','title'=>'点击换图','style'=>'display:block;float:left;border:0px solid #68AECF;margin-left:5px;')));
									?>
									</p>
									
									<p style="clear:both;"><input type="submit" value="发送" style="font-family:'幼圆';background:none;font-weight:normal;font-size:15px;margin-top:20px;border:1px solid black;border-radius:7px;width:70px;" />
									<img class="ajax-loader" style="visibility: hidden;" alt="Sending ..." src="http://okaythemes.com/dispatch/wp-content/plugins/contact-form-7/<?php echo Yii::app()->request->baseUrl; ?>/assets/index/images/ajax-loader.gif" /></p>
									<div class="wpcf7-response-output wpcf7-display-none"></div>
								<!-- </form> -->
								<?php $this->endWidget(); ?>
								
								</div>
							</div><!-- frame -->
						</div><!-- shadow -->
						
						<!-- meta info bar -->
						<div class="bar" id="bar">
							<div class="bar-frame clearfix">
								<div class="date">
									<strong class="day"><?php echo date("d"); ?></strong>
									<div class="holder">
										<span class="month"><?php echo date("M"); ?></span>
										<span class="year"><?php echo date("Y"); ?></span>
									</div>
								</div>
								<!-- 
								<div class="author">
									<strong class="title">AUTHOR</strong>
									<a href="http://mikemcalister.com" title="Visit Mike McAlister&#8217;s website" rel="external">Mike McAlister</a>								</div>
								<div class="categories">
									<strong class="title">CATEGORY</strong>
									<p></p>
								</div>
								<div class="comments">
									<strong class="title">COMMENTS</strong>
									<a href="#">No Comments</a>
								</div>								
							  	 -->
							  </div><!-- bar frame -->
						</div><!-- bar -->
					</div><!-- box -->
				</div><!--writing post-->
				
				<div style="clear:both;"> </div>
								
				<div class="post-nav">
					<div class="postnav-left"></div>
					<div class="postnav-right"></div>
					<div style="clear:both;"> </div>
				</div><!--end post navigation-->
				
								
				<!-- grab comments on single pages -->
							</div><!--content-->
			<div class="push"></div>
		</div><!--main-->
		