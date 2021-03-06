<div class="row">
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-content">

				<?php
					if (isset($edit)) {
						echo $this->Form->create( 'BusinessContinuity', array(
							'url' => array( 'controller' => 'businessContinuities', 'action' => 'edit' ),
							'class' => 'form-horizontal row-border'
						) );

						echo $this->Form->input( 'id', array( 'type' => 'hidden' ) );
						$submit_label = __( 'Edit' );
					}
					else {
						echo $this->Form->create( 'BusinessContinuity', array(
							'url' => array( 'controller' => 'businessContinuities', 'action' => 'add' ),
							'class' => 'form-horizontal row-border'
						) );
						
						$submit_label = __( 'Add' );
					}
				?>
				<?php echo $this->Form->input( 'mitigate_id', array(
					'type' => 'hidden',
					'value' => $mitigate_id,
					'id' => 'mitigate_id'
				) ); ?>
				<?php echo $this->Form->input( 'accept_id', array(
					'type' => 'hidden',
					'value' => $accept_id,
					'id' => 'accept_id'
				) ); ?>
				<?php echo $this->Form->input( 'transfer_id', array(
					'type' => 'hidden',
					'value' => $transfer_id,
					'id' => 'transfer_id'
				) ); ?>

				<div class="form-group form-group-first">
					<label class="col-md-2 control-label"><?php echo __( 'Title' ); ?>:</label>
					<div class="col-md-10">
						<?php echo $this->Form->input( 'title', array(
							'label' => false,
							'div' => false,
							'class' => 'form-control'
						) ); ?>
						<span class="help-block"><?php echo __( 'Give this risk a descriptive title' ); ?></span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label"><?php echo __( 'Applicable Business Units' ); ?>:</label>
					<div class="col-md-10">
						<?php
							$selected = array();
							if ( isset( $this->request->data['BusinessUnit'] ) ) {
								foreach ( $this->request->data['BusinessUnit'] as $entry ) {
									$selected[] = $entry['id'];
								}
							}

							if ( isset( $this->request->data['BusinessContinuity']['business_unit_id'] ) && is_array( $this->request->data['BusinessContinuity']['business_unit_id'] ) ) {
								foreach ( $this->request->data['BusinessContinuity']['business_unit_id'] as $entry ) {
									$selected[] = $entry;
								}
							}
						?>
						<?php echo $this->Form->input( 'business_unit_id', array(
							'options' => $business_units,
							'label' => false,
							'div' => false,
							'class' => 'select2 col-md-12 full-width-fix select2-offscreen',
							'multiple' => true,
							'selected' => $selected
						) ); ?>
						<span class="help-block"><?php echo __( 'Which Business Processes are you Risk Analysing?' ); ?></span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label"><?php echo __( 'Business Impact' ); ?>:</label>
					<div class="col-md-10">
						<?php echo $this->Form->input( 'impact', array(
							'type' => 'textarea',
							'label' => false,
							'div' => false,
							'class' => 'form-control'
						) ); ?>
						<span class="help-block"><?php echo __( 'What is the Business Impact if this Risk materializes?' ); ?></span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label"><?php echo __( 'Threats Tags' ); ?>:</label>
					<div class="col-md-10">
						<?php
							$selected = array();
							if ( isset( $this->request->data['Threat'] ) ) {
								foreach ( $this->request->data['Threat'] as $entry ) {
									$selected[] = $entry['id'];
								}
							}

							if ( isset( $this->request->data['BusinessContinuity']['threat_id'] ) && is_array( $this->request->data['BusinessContinuity']['threat_id'] ) ) {
								foreach ( $this->request->data['BusinessContinuity']['threat_id'] as $entry ) {
									$selected[] = $entry;
								}
							}
						?>
						<?php echo $this->Form->input( 'threat_id', array(
							'options' => $threats,
							'label' => false,
							'div' => false,
							'class' => 'select2 col-md-12 full-width-fix select2-offscreen',
							'multiple' => true,
							'selected' => $selected
						) ); ?>
						<span class="help-block"><?php echo __( 'Select all Applicable Threats' ); ?></span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label"><?php echo __( 'Threat Description' ); ?>:</label>
					<div class="col-md-10">
						<?php echo $this->Form->input( 'threats', array(
							'type' => 'textarea',
							'label' => false,
							'div' => false,
							'class' => 'form-control'
						) ); ?>
						<span class="help-block"><?php echo __( 'Describe the Threats context if you wish.' ); ?></span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label"><?php echo __( 'Vulnerabilities Tags' ); ?>:</label>
					<div class="col-md-10">
						<?php
							$selected = array();
							if ( isset( $this->request->data['Vulnerability'] ) ) {
								foreach ( $this->request->data['Vulnerability'] as $entry ) {
									$selected[] = $entry['id'];
								}
							}

							if ( isset( $this->request->data['BusinessContinuity']['vulnerability_id'] ) && is_array( $this->request->data['BusinessContinuity']['vulnerability_id'] ) ) {
								foreach ( $this->request->data['BusinessContinuity']['vulnerability_id'] as $entry ) {
									$selected[] = $entry;
								}
							}
						?>
						<?php echo $this->Form->input( 'vulnerability_id', array(
							'options' => $vulnerabilities,
							'label' => false,
							'div' => false,
							'class' => 'select2 col-md-12 full-width-fix select2-offscreen',
							'multiple' => true,
							'selected' => $selected
						) ); ?>
						<span class="help-block"><?php echo __( 'Select all Applicable Vulnerabilities' ); ?></span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label"><?php echo __( 'Vulnerabilities Description' ); ?>:</label>
					<div class="col-md-10">
						<?php echo $this->Form->input( 'vulnerabilities', array(
							'type' => 'textarea',
							'label' => false,
							'div' => false,
							'class' => 'form-control'
						) ); ?>
						<span class="help-block"><?php echo __( 'Describe the Vulnerabiliites context if you wish.' ); ?></span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label"><?php echo __( 'Risk Classification' ); ?>:</label>
					<div class="col-md-10">
						<?php
						foreach ( $classifications as $classification_type ) :
							$options = array();
							$options_ids = array();
							if ( empty( $classification_type['RiskClassification'] ) )
								continue;

							foreach ( $classification_type['RiskClassification'] as $risk_classification ) {
								$options[ $risk_classification['id'] ] = $risk_classification['name'];
								$options_ids[] = $risk_classification['id'];
							}

							$selected = null;
							if ( isset( $this->request->data['RiskClassification'] ) ) {
								foreach ( $this->request->data['RiskClassification'] as $ac ) {
									if ( in_array( $ac['id'], $options_ids ) ) {
										$selected = $ac['id'];
									}
								}
							}

							echo $this->Form->input( 'risk_classification_id][', array(
								'options' => $options,
								'label' => false,
								'div' => false,
								'style' => 'margin-bottom:5px;',
								'empty' => __( 'Classification' ) . ': ' . $classification_type['RiskClassificationType']['name'],
								'class' => 'form-control',
								'selected' => $selected
							) );
						endforeach;
						?>
						<span class="help-block"><?php echo __( 'Based on the Classification Scheme you have previously defined, classify this Risk.' ); ?></span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label"><?php echo __( 'Risk Score' ); ?>:</label>
					<div class="col-md-10">
						<?php echo $this->Form->input( 'risk_score', array(
							'label' => false,
							'div' => false,
							'class' => 'form-control',
							'disabled' => 'disabled'
						) ); ?>
						<span class="help-block"><?php echo __( 'The Risk Score is automatically calculated using the Classification Schemas and Asset Liabilities Amplifier if they exist.' ); ?></span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label"><?php echo __( 'Risk Mitigation' ); ?>:</label>
					<div class="col-md-10">
						<?php echo $this->Form->input( 'risk_mitigation_strategy_id', array(
							'options' => $strategies,
							'label' => false,
							'div' => false,
							'class' => 'form-control',
							'id' => 'risk_mitigation_strategy'
						) ); ?>
						<span class="help-block"><?php echo __( 'Choose a Mitigation strategy for this Risk' ); ?></span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label"><?php echo __( 'Compensating controls' ); ?>:</label>
					<div class="col-md-10">
						<?php
							$selected = array();
							if ( isset( $this->request->data['SecurityService'] ) ) {
								foreach ( $this->request->data['SecurityService'] as $entry ) {
									$selected[] = $entry['id'];
								}
							}

							if ( isset( $this->request->data['BusinessContinuity']['security_service_id'] ) && is_array( $this->request->data['BusinessContinuity']['security_service_id'] ) ) {
								foreach ( $this->request->data['BusinessContinuity']['security_service_id'] as $entry ) {
									$selected[] = $entry;
								}
							}
						?>
						<?php echo $this->Form->input( 'security_service_id', array(
							'options' => $services,
							'label' => false,
							'div' => false,
							'class' => 'select2 col-md-12 full-width-fix select2-offscreen',
							'multiple' => true,
							'hiddenField' => false,
							'id' => 'compensating_controls',
							'selected' => $selected
						) ); ?>
						<span class="help-block"><?php echo __( 'Select which Controls you wish to utilize to threat this Risk' ); ?></span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label"><?php echo __( 'Residual Score' ); ?>:</label>
					<div class="col-md-10">
						<?php echo $this->Form->input( 'residual_score', array(
							'label' => false,
							'div' => false,
							'class' => 'form-control'
						) ); ?>
						<span class="help-block"><?php echo __( 'Select the percentage of Risk Reduction that was achieved by applying Security Controls. This is a subjective appreciation.' ); ?></span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label"><?php echo __( 'Applicable Risk Exceptions' ); ?>:</label>
					<div class="col-md-10">
						<?php
							$selected = array();
							if ( isset( $this->request->data['RiskException'] ) ) {
								foreach ( $this->request->data['RiskException'] as $entry ) {
									$selected[] = $entry['id'];
								}
							}

							if ( isset( $this->request->data['BusinessContinuity']['risk_exception_id'] ) && is_array( $this->request->data['BusinessContinuity']['risk_exception_id'] ) ) {
								foreach ( $this->request->data['BusinessContinuity']['risk_exception_id'] as $entry ) {
									$selected[] = $entry;
								}
							}
						?>
						<?php echo $this->Form->input( 'risk_exception_id', array(
							'options' => $risk_exceptions,
							'label' => false,
							'div' => false,
							'class' => 'select2 col-md-12 full-width-fix select2-offscreen',
							'multiple' => true,
							'hiddenField' => false,
							'id' => 'risk_exceptions',
							'selected' => $selected
						) ); ?>
						<span class="help-block"><?php echo __( 'Select which Risk Exceptions you wish to utilize to threat this Risk' ); ?></span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label"><?php echo __( 'Owner' ); ?>:</label>
					<div class="col-md-10">
						<?php echo $this->Form->input( 'user_id', array(
							'options' => $users,
							'label' => false,
							'div' => false,
							'class' => 'form-control'
						) ); ?>
						<span class="help-block"><?php echo __( 'Who is the owner of this Risk?' ); ?></span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label"><?php echo __( 'Review' ); ?>:</label>
					<div class="col-md-10">
						<?php echo $this->Form->input( 'review', array(
							'label' => false,
							'div' => false,
							'class' => 'form-control'
						) ); ?>
						<span class="help-block"><?php echo __( 'Select a Date where this Risk should be Reviewed.' ); ?></span>
					</div>
				</div>

				<div class="form-actions">
					<?php echo $this->Form->submit( $submit_label, array(
						'class' => 'btn btn-primary',
						'div' => false
					) ); ?>
					&nbsp;
					<?php echo $this->Html->link( __( 'Cancel' ), array(
						'action' => 'index'
					), array(
						'class' => 'btn btn-inverse'
					) ); ?>
				</div>

				<?php echo $this->Form->end(); ?>

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	jQuery(function($){
		var risk_mitigation_ele = $("#risk_mitigation_strategy");
		var compensating_controls_ele = $("#compensating_controls");
		var risk_exceptions_ele = $("#risk_exceptions");

		var mitigate_id = parseInt( $("#mitigate_id").val() );
		var accept_id = parseInt( $("#accept_id").val() );
		var transfer_id = parseInt( $("#transfer_id").val() );

		risk_mitigation_ele.on("change", function(e) {
			var val = parseInt( $(this).val() );

			if ( val == mitigate_id ) {
				compensating_controls_ele.prop("disabled", false);
			} else {
				compensating_controls_ele.prop("disabled", true);
			}

			if ( val == accept_id || val == transfer_id ) {
				risk_exceptions_ele.prop("disabled", false);
			} else {
				risk_exceptions_ele.prop("disabled", true);
			}
		}).trigger("change");
	});
</script>