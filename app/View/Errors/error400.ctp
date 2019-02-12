<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$this->layout = 'top_navigation';
?>

<div class="row error-pages">
    <div class="col-md-12">
        <div class="error-template">
            <div class="error-details">
            	<div class="col-sm-12">
		            <h1> Oops!</h1>
		            <h2> <?php echo __('404 No encontrado'); ?></h2>
                    <br>
	                <p class="error">
						<strong><?php echo __d('cake', 'Error'); ?>: </strong>
						<?php printf(
							__d('cake', 'La dirección solicitada %s no fué encontrada en este servidor.'),
							"<strong>'{$url}'</strong>"
						); ?>
					</p>
            	</div>
            </div>
            <div class="error-actions">
                <a href="<?php echo $this->Html->url('/'); ?>" class="btn btn-info btn-lg">
                	<span class="glyphicon glyphicon-home"></span>
                    <?php echo __('Ir al inicio'); ?>
                </a>
            </div>
        </div>
    </div>
</div>
<?php
if (Configure::read('debug') > 0):
	echo '<div class="container">'.$this->element('exception_stack_trace').'</div>';
endif;
?>
<style type="text/css">
	.img-error{margin-top: -80px;margin-right: 10px;margin-left: -40px;}
	.error-pages { background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAABZ0RVh0Q3JlYXRpb24gVGltZQAxMC8yOS8xMiKqq3kAAAAcdEVYdFNvZnR3YXJlAEFkb2JlIEZpcmV3b3JrcyBDUzVxteM2AAABHklEQVRIib2Vyw6EIAxFW5idr///Qx9sfG3pLEyJ3tAwi5EmBqRo7vHawiEEERHS6x7MTMxMVv6+z3tPMUYSkfTM/R0fEaG2bbMv+Gc4nZzn+dN4HAcREa3r+hi3bcuu68jLskhVIlW073tWaYlQ9+F9IpqmSfq+fwskhdO/AwmUTJXrOuaRQNeRkOd5lq7rXmS5InmERKoER/QMvUAPlZDHcZRhGN4CSeGY+aHMqgcks5RrHv/eeh455x5KrMq2yHQdibDO6ncG/KZWL7M8xDyS1/MIO0NJqdULLS81X6/X6aR0nqBSJcPeZnlZrzN477NKURn2Nus8sjzmEII0TfMiyxUuxphVWjpJkbx0btUnshRihVv70Bv8ItXq6Asoi/ZiCbU6YgAAAABJRU5ErkJggg==);}
	.error-template {padding: 40px 15px;text-align: center;}
	.error-actions {margin-top:15px;margin-bottom:15px;}
	.error-actions .btn { margin-right:10px; }
</style>
