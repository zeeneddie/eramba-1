<div class="row">

	<div class="col-md-12">
		<div class="widget">
			<div class="btn-toolbar">
				<div class="btn-group">
					<?php echo $this->Html->link( '<i class="icon-plus-sign"></i>' . __( 'Add New' ), array(
						'controller' => 'policyExceptions',
						'action' => 'add'
					), array(
						'class' => 'btn',
						'escape' => false
					) ); ?>
					
					<button class="btn dropdown-toggle" data-toggle="dropdown"><?php echo __( 'Actions' ); ?> <span class="caret"></span></button>
					<ul class="dropdown-menu pull-right" style="text-align: left;">
						<li><a href="#"><i class="icon-file"></i> <?php echo __( 'Export' ); ?></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="widget">
			<?php if ( ! empty( $data ) ) : ?>
				<table class="table table-hover table-striped table-bordered table-highlight-head">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort( 'PolicyException.title', __( 'Title' ) ); ?></th>
							<th><?php echo $this->Paginator->sort( 'PolicyException.description', __( 'Description' ) ); ?></th>
							<th><?php echo $this->Paginator->sort( 'PolicyExceptionStatus.name', __( 'Status' ) ); ?></th>
							<th><?php echo $this->Paginator->sort( 'User.name', __( 'Owner' ) ); ?></th>
							<th><?php echo $this->Paginator->sort( 'PolicyException.expiration', __( 'Expiration' ) ); ?></th>
							<th><?php echo __( 'Expiration' ); ?>
							<th class="align-center"><?php echo __( 'Action' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ( $data as $entry ) : ?>
							<tr>
								<td><?php echo $entry['PolicyException']['title']; ?></td>
								<td><?php echo $entry['PolicyException']['description']; ?></td>
								<td><?php echo $entry['PolicyExceptionStatus']['name']; ?></td>
								<td><?php echo $entry['User']['name'] . ' ' . $entry['User']['surname']; ?></td>
								<td><?php echo $entry['PolicyException']['expiration']; ?></td>
								<?php
								$today = CakeTime::format( 'Y-m-d', CakeTime::fromString( 'now' ) );
								$notification = '<span class="label label-success">' . __( 'Not Expired' ) . '</span>';
								if ( $entry['PolicyException']['expiration'] > $today ) {
									$notification = '<span class="label label-danger">' . __( 'Expired' ) . '</span>';
								}
								?>
								<td><?php echo $notification; ?></td>
								<td class="align-center">
									<?php echo $this->element( 'action_buttons', array( 
										'id' => $entry['PolicyException']['id'],
										'controller' => 'policyExceptions'
									) ); ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>

				<?php echo $this->element( CORE_ELEMENT_PATH . 'pagination' ); ?>
			<?php else : ?>
				<?php echo $this->element( 'not_found', array(
					'message' => __( 'No Security Incidents found.' )
				) ); ?>
			<?php endif; ?>

		</div>
	</div>

</div>