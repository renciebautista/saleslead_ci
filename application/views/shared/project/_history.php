<?php if(!empty($details)): ?>
					<div class="panel-body">
						<ul class="timeline">
							<?php foreach ($details as $row):?>
							<li class="timeline-inverted">
								<div class="timeline-badge">
									<img class="img-circle" alt="50x50" style="width: 50px; height: 50px;" src="<?php echo base_url('uploads/thumbnail/'.$row['avatar']); ?>">
								</div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<p>
											<strong class="bdo-name"><?php echo strtoupper($row['ulast_name'].', '.$row['ufirst_name'].' '.$row['umiddle_name']); ?></strong>
										</p>
										<p><small class="text-muted"><i class="fa fa-clock-o"></i> <?php echo date_format(date_create($row['created_at']),'m/d/y H:i:s'); ?></small>
									</div>
									<div class="timeline-body">
										<em><?php echo strtoupper($row['last_name'].', '.$row['first_name'].' '.$row['middle_name']); ?> ( <?php echo $row['grouptype_desc']; ?>)</em>
										<p><?php echo nl2br($row['details']); ?></p>
									</div>
									<?php if(!empty($row['files'])): ?>
									<div class="attached-files">
										<p style="padding-top:5px;border-bottom: 1px solid #ccc;">Attached files</p>
										<ul>
											<?php foreach ($row['files'] as $file):?>
											<li><a href="<?php echo base_url('project/getfile/'.$file['hashname']); ?>"><?php echo $file['filename']; ?></a></li>
											<?php endforeach; ?>
										</ul>
									</div>
									<?php endif; ?>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<?php endif; ?>