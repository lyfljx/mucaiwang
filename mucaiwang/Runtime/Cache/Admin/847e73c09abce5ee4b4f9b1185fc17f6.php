<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<link rel="stylesheet" href="<?php echo (ADMIN_CSS_URL); ?>public.css"/>
<link rel="stylesheet" href="<?php echo (ADMIN_CSS_URL); ?>node.css"/>
<!-- 这里是节点列表页面，添加的链接到addnode处理 -->
</head>
<body>
	<div id="wrap">
		<a href="<?php echo U('Admin/Rbac/addNode');?>" class="add-app">添加应用</a>
		
		<?php if(is_array($node)): foreach($node as $key=>$app): ?><div class='app'>
				<p>
					<strong><?php echo ($app["title"]); ?></strong>
					[<a href="<?php echo U('Admin/Rbac/addnode',array('pid'=>$app['id'],'level'=>2));?>">添加控制器</a>]
					[<a href="<?php echo U('Admin/Rbac/altNode',array('nid'=>$app['id'],'level'=>1));?>">修改</a>]
					[<a href="<?php echo U('Admin/Rbac/delNode',array('nid'=>$app['id']));?>">删除</a>]
				</p>
				
				
				<?php if(is_array($app["child"])): foreach($app["child"] as $key=>$action): ?><dl>
						<dt>
							<strong><?php echo ($action["title"]); ?></strong>
							[<a href="<?php echo U('Admin/Rbac/addnode',array('pid'=>$action['id'],'level'=>3));?>">添加方法</a>]
						</dt>
						
						
						
						<?php if(is_array($action["child"])): foreach($action["child"] as $key=>$method): ?><dd>
								<span><?php echo ($method["title"]); ?></span>
								[<a href="<?php echo U('Admin/Rbac/altNode',array('nid'=>$method['id'],'pid'=>$action['id'],'level'=>3));?>">修改</a>]
								[<a href="<?php echo U('Admin/Rbac/delNode',array('nid'=>$method['id']));?>">删除</a>]
							</dd><?php endforeach; endif; ?>
					</dl><?php endforeach; endif; ?>
				
			</div><?php endforeach; endif; ?>
	</div>
</body>
</html>