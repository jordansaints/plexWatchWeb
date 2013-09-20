<?php

require '../config.php';

			
$statusSessions = simplexml_load_file("http://".$plexWatch['pmsUrl'].":32400/status/sessions");		
if ($statusSessions['size'] == '0') {
	echo "<h5><strong>Nothing is currently being watched.</strong></h5><br>";
}else{
// Run through each feed item
				foreach ($statusSessions->Video as $sessions) {
													
				$sessionsthumbltrim1 = ltrim($sessions['grandparentThumb'], "/library/metadata/");
				$sessionsthumbmeta = substr($sessionsthumbltrim1, 5, 19);
				$sessionsthumb = ltrim($sessionsthumbmeta, "/thumb/");                        
										
				if ($sessions['type'] == "episode") {
					
					$sessionsArtUrl = "http://".$plexWatch['pmsUrl'].":32400/photo/:/transcode?url=http%3A%2F%2F127.0.0.1%3A32400%2Flibrary%2Fmetadata%2F" .$sessions['grandparentRatingKey']. "%2Fart%3Ft%3D" .$sessionsthumb. "&width=330&height=160";                                        
					$sessionsCoverUrl = "http://".$plexWatch['pmsUrl'].":32400/photo/:/transcode?url=http%3A%2F%2F127.0.0.1%3A32400%2Flibrary%2Fmetadata%2F" .$sessions['grandparentRatingKey']. "%2Fthumb%3Ft%3D" .$sessionsthumb. "&width=136&height=280";                                        
					$sessionsThumbUrl = "http://".$plexWatch['pmsUrl'].":32400/photo/:/transcode?url=http%3A%2F%2F127.0.0.1%3A32400%2Flibrary%2Fmetadata%2F" .$sessions['ratingKey']. "%2Fthumb%3Ft%3D" .$sessionsthumb. "&width=300&height=169";                                        
					
					echo "<div class='instance'>";
						
						echo "<div class='poster'><div class='dashboard-activity-poster-face'><a href='info.php?id=" .$sessions['ratingKey']. "'><img src='".$sessionsThumbUrl."' ></img></a></div>";
							
							echo "<div class='dashboard-activity-metadata-wrapper'>";
								
								echo "<div class='dashboard-activity-instance-overlay'>";
								
									echo "<div class='dashboard-activity-metadata-progress-minutes'>";
																		
										$percentComplete = sprintf("%2d", ($sessions['viewOffset'] / $sessions['duration']) * 100);
										if ($percentComplete >= 90) {	
											$percentComplete = 100;    
										}
																			
										echo "<div class='progress progress-warning'><div class='bar' style='width: ".$percentComplete."%'>".$percentComplete."%</div></div>";												
																			
									echo "</div>";

									echo "<div class='dashboard-activity-metadata-title'>"; 
										echo "".$sessions['grandparentTitle']." - \"".$sessions['title']."\"";
									echo "</div>";
								
									echo "<div class='platform'>";
										echo "".$sessions->Player['title']. "";
									echo "</div>";
							
									if (empty($sessions->User['title'])) {
										if ($sessions->Player['state'] == "playing") {
											echo "<div class='dashboard-activity-metadata-user'>";
											echo "<a href='user.php?user=Local'>Local</a>";
											echo "</div>";
										}elseif ($sessions->Player['state'] == "paused") {	 
											echo "<div class='dashboard-activity-metadata-user'>";
											echo "<a href='user.php?user=Local'>Local</a>";
											echo "</div>";
										}
																	
									}else{
																	
										if ($sessions->Player['state'] == "playing") {
											echo "<div class='dashboard-activity-metadata-user'>";
											echo "<a href='user.php?user=".$sessions->User['title']."'>".$sessions->User['title']."</a>";
											echo "</div>";
										}elseif ($sessions->Player['state'] == "paused") {	 
											echo "<div class='dashboard-activity-metadata-user'>";
											echo "<a href='user.php?user=".$sessions->User['title']."'>".$sessions->User['title']."</a>";
											echo "</div>";
										}
									}
								
								echo "</div>";
							echo "</div>";
						echo "</div>";
					echo "</div>";
				
					}elseif ($sessions['type'] == "movie") {
						
					$sessionsThumbUrl = "http://".$plexWatch['pmsUrl'].":32400/photo/:/transcode?url=http%3A%2F%2F127.0.0.1%3A32400%2Flibrary%2Fmetadata%2F" .$sessions['ratingKey']. "%2Fart%3Ft%3D" .$sessionsthumb. "&width=300&height=169";                                        
					echo "<div class='instance'>";

						echo "<div class='poster'><div class='dashboard-activity-poster-face'><a href='info.php?id=" .$sessions['ratingKey']. "'><img src='".$sessionsThumbUrl."' ></img></a></div>";

							echo "<div class='dashboard-activity-metadata-wrapper'>";

								echo "<div class='dashboard-activity-instance-overlay'>";
								
									echo "<div class='dashboard-activity-metadata-progress-minutes'>";
																		
										$percentComplete = sprintf("%2d", ($sessions['viewOffset'] / $sessions['duration']) * 100);
										if ($percentComplete >= 90) {	
											$percentComplete = 100;    
										}
																			
										echo "<div class='progress progress-warning'><div class='bar' style='width: ".$percentComplete."%'>".$percentComplete."%</div></div>";												
																			
									echo "</div>";

									echo "<div class='dashboard-activity-metadata-title'>"; 
										echo "".$sessions['title']."";
									echo "</div>";
								
									echo "<div class='platform'>";
										echo "".$sessions->Player['title']. "";
									echo "</div>";
							
									if (empty($sessions->User['title'])) {
										if ($sessions->Player['state'] == "playing") {
											echo "<div class='dashboard-activity-metadata-user'>";
											echo "<a href='user.php?user=Local'>Local</a>";
											echo "</div>";
										}elseif ($sessions->Player['state'] == "paused") {	 
											echo "<div class='dashboard-activity-metadata-user'>";
											echo "<a href='user.php?user=Local'>Local</a>";
											echo "</div>";
										}
																	
									}else{
																	
										if ($sessions->Player['state'] == "playing") {
											echo "<div class='dashboard-activity-metadata-user'>";
											echo "<a href='user.php?user=".$sessions->User['title']."'>".$sessions->User['title']."</a>";
											echo "</div>";
										}elseif ($sessions->Player['state'] == "paused") {	 
											echo "<div class='dashboard-activity-metadata-user'>";
											echo "<a href='user.php?user=".$sessions->User['title']."'>".$sessions->User['title']."</a>";
											echo "</div>";
										}
									}
								
								echo "</div>";
							echo "</div>";
						echo "</div>";
					echo "</div>";
			
						
					}else{
					
					}
				}	
}			
?>