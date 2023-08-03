<div id="submenu" class="panel-collapse collapse">
        <div class="panel-body" >
                <table class="table1">
                        <?php
                            if ($_SESSION['Emp_pos'] == 'Records Officer') { ?>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowInmateGlobal()" style="cursor:hand;">
                                                                List of Inmate
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['TotalInmate']); ?></span>
                                                </td>
                                                <td><td>
                                        </tr>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowCaseGlobal()" style="cursor:hand;">
                                                                Case
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['caseCount']); ?></span>
                                                </td>
                                        </tr>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowJailBookingGlobal()" style="cursor:hand;">
                                                                Jail Booking
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['JailCount']); ?></span>
                                                </td>
                                        </tr> 
                            <?php } elseif ($_SESSION['Emp_pos'] == 'Paralegal Officer') { ?>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowInmateGlobal()" style="cursor:hand;">
                                                                List of Inmate
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['TotalInmate']); ?></span>
                                                </td>
                                        </tr>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowCaseGlobal()" style="cursor:hand;">
                                                                Case
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['caseCount']); ?></span>
                                                </td>
                                        </tr>
                                        <!-- <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowDAGlobal()" style="cursor:hand;">
                                                                Disciplinary Action
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['dacount']); ?></span>
                                                </td>
                                        </tr> -->
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowHearingGlobal()" style="cursor:hand;">
                                                                Hearing
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['HearingCount']); ?></span>
                                                </td>
                                        </tr>
                            <?php } elseif ($_SESSION['Emp_pos'] == 'IWD unit Officer') { ?>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowInmateGlobal()" style="cursor:hand;">
                                                                List of Inmate
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['TotalInmate']); ?></span>
                                                </td>
                                        </tr>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowProgramGlobal()" style="cursor:hand;">
                                                                Program
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['programCount']); ?></span>
                                                </td>
                                        </tr>
                            <?php } elseif ($_SESSION['Emp_pos'] == 'Search Officer') { ?>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowInmateGlobal()" style="cursor:hand;">
                                                                List of Inmate
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['TotalInmate']); ?></span>
                                                </td>
                                        </tr>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowVisitorGlobal()" style="cursor:hand;">
                                                                Visitor
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['TotalVisitor']); ?></span>
                                                </td>
                                        </tr>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowItemsGlobal()" style="cursor:hand;">
                                                                Items
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['TotalVisitorItem']); ?></span>
                                                </td>
                                        </tr>
                            <?php } elseif ($_SESSION['Emp_pos'] == 'Custodial Officer') { ?>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowInmateGlobal()" style="cursor:hand;">
                                                                List of Inmate
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['TotalInmate']); ?></span>
                                                </td>
                                        </tr>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowpropertyGlobal()" style="cursor:hand;">
                                                                Property of Inmate
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['propertyCount']); ?></span>
                                                </td>
                                        </tr>
                            <?php } elseif ($_SESSION['Emp_pos'] == 'Jail Nurse') { ?>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowInmateGlobal()" style="cursor:hand;">
                                                                List of Inmate
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['TotalInmate']); ?></span>
                                                </td>
                                        </tr>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowMedicalGlobal()" style="cursor:hand;">
                                                                Medical
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['medicalCount']); ?></span>
                                                </td>
                                        </tr>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowDentalGlobal()" style="cursor:hand;">
                                                                Dental
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['dentalCount']); ?></span>
                                                </td>
                                        </tr>
                                        
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowDeceasedGlobal()" style="cursor:hand;">
                                                                Deceased
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['deceasedCount']); ?></span>
                                                </td>
                                        </tr>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowMedicalOfficerGlobal()" style="cursor:hand;">
                                                                Medical of Officer
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['medicalCount']); ?></span>
                                                </td>
                                        </tr>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowDentalOfficerGlobal()" style="cursor:hand;">
                                                                Dental of Officer
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['dentalCount']); ?></span>
                                                </td>
                                        </tr>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowDeceasedlOfficerGlobal()" style="cursor:hand;">
                                                                Deceased of Officer
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['deceasedCount']); ?></span>
                                                </td>
                                        </tr>
                            <?php } else { ?>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowInmateGlobal()" style="cursor:hand;">
                                                                List of Inmate
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['TotalInmate']); ?></span>
                                                </td>
                                        </tr>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowCaseGlobal()" style="cursor:hand;">
                                                                Case
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['caseCount']); ?></span>
                                                </td>
                                        </tr>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowDAGlobal()" style="cursor:hand;">
                                                                Disciplinary Action
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['dacount']); ?></span>
                                                </td>
                                        </tr>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowHearingGlobal()" style="cursor:hand;">
                                                                Hearing
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['HearingCount']); ?></span>
                                                </td>
                                        </tr>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowJailBookingGlobal()" style="cursor:hand;">
                                                                Jail Booking
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['JailCount']); ?></span>
                                                </td>
                                        </tr>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowProgramGlobal()" style="cursor:hand;">
                                                                Program
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['programCount']); ?></span>
                                                </td>
                                        </tr>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowpropertyGlobal()" style="cursor:hand;">
                                                                Property of Inmate
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['propertyCount']); ?></span>
                                                </td>
                                        </tr>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowMedicalGlobal()" style="cursor:hand;">
                                                                Medical
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['medicalCount']); ?></span>
                                                </td>
                                        </tr>
                                        
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowDentalGlobal()" style="cursor:hand;">
                                                                Dental
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['dentalCount']); ?></span>
                                                </td>
                                        </tr>
                                        
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowDeceasedGlobal()" style="cursor:hand;">
                                                                Deceased
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['deceasedCount']); ?></span>
                                                </td>
                                        </tr>
                                        
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowVisitorGlobal()" style="cursor:hand;">
                                                                Visitor
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['TotalVisitor']); ?></span>
                                                </td>
                                        </tr>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowItemsGlobal()" style="cursor:hand;">
                                                                Items
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['TotalVisitorItem']); ?></span>
                                                </td>
                                        </tr>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowMedicalOfficerGlobal()" style="cursor:hand;">
                                                                Medical of Officer
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['medicalCount']); ?></span>
                                                </td>
                                        </tr>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowDentalOfficerGlobal()" style="cursor:hand;">
                                                                Dental of Officer
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['dentalCount']); ?></span>
                                                </td>
                                        </tr>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowDeceasedlOfficerGlobal()" style="cursor:hand;">
                                                                Deceased of Officer
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['deceasedCount']); ?></span>
                                                </td>
                                        </tr>
                                        <tr >
                                                <td style="font-size:16px; padding-bottom: 5px;">
                                                        <span class="glyphicon glyphicon-chevron-right" style="color: #376ec6; font-size: 13px;"></span>
                                                        <a onclick="ShowListDorms()" style="cursor:hand;">
                                                                List of Inmate Dorms
                                                        </a><span class="label label-primary pull-right"><?php echo ucwords($_SESSION['deceasedCount']); ?></span>
                                                </td>
                                        </tr>
                            <?php }
                        ?>
                        
                </table>
        </div>
</div>