<div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
            
                    <div class="page-sidebar navbar-collapse collapse">
                        
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                            <li class="nav-item start active open">
                                <a href="<?php echo base_url(); ?>" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Dashboard</span>
                                    <span class="selected"></span>
                                    <span class="open"></span>
                                </a>
                            </li>

                            <!-- <li class="heading">
                                <h3 class="uppercase">Layouts</h3>
                            </li> -->
                            <?php
                                $ci =& get_instance();
                                $mainPage=$ci->router->fetch_class();
                                $subPage=$mainPage."/".$ci->router->fetch_method();

                                for ($i=0; $i<count($res); $i++){
                                    
                                    $arr=explode(',', $res[$i]['m_menu_alias']);
                                    if(in_array($mainPage, $arr)){
                                        $opnSts=" open";
                                        $dispSubMenu='style="display: block;"';
                                    }else{
                                        $opnSts="";
                                        $dispSubMenu='style="display: none;"';
                                    }
                            ?>
                            <li class="nav-item <?php echo $opnSts; ?>">
                                 <?php
                                    $sql="SELECT * FROM sub_menu WHERE m_menu_id=".$res[$i]['m_menu_id'];
                                    $query = $this->db->query($sql);
                                    $subRes = $query->result_array();
                                    $arrow="";
                                    if(!empty($subRes)){
                                        $arrow="arrow";
                                    }
                                ?>
                                <a href="<?php echo base_url($res[$i]['m_menu_link']); ?>" class="nav-link nav-toggle">
                                    <i class="icon-layers"></i>
                                    <span class="title"><?php echo $res[$i]['m_menu_name']; ?></span>
                                    <span class="<?php echo $arrow; ?> <?php echo $opnSts; ?>"></span>
                                </a>
                                <?php
                                    /*$sql="SELECT * FROM sub_menu WHERE m_menu_id=".$res[$i]['m_menu_id'];
                                    $query = $this->db->query($sql);
                                    $subRes = $query->result_array();*/
                                    if(!empty($subRes)){
                                ?>
                                <ul class="sub-menu" <?php echo $dispSubMenu; ?>>
                                    <?php
                                        for ($j=0; $j<count($subRes); $j++) {
                                            if($subRes[$j]['s_menu_alias'] == $subPage){
                                                $addClass=" active";
                                            }else{
                                                $addClass="";
                                            }
                                    ?>
                                    <li class="nav-item <?php echo $addClass; ?>">
                                        <a href="<?php echo base_url($subRes[$j]['s_menu_link']); ?>" class="nav-link nav-toggle">
                                            <i class="icon-settings"></i> <?php echo $subRes[$j]['s_menu_name']; ?>
                                            <span class=""></span>
                                        </a>
                                    </li>
                                    <?php }//Sub Menu For ?>
                                </ul>
                            </li>
                            <?php } ?>
                        <?php } ?>
                        </ul>
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>