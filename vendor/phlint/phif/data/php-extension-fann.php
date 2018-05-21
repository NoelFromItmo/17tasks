<?php

/**
 * @param resource $ann
 * @param resource $data
 * @param int $max_neurons
 * @param int $neurons_between_reports
 * @param float $desired_error
 * @return bool
 */
function fann_cascadetrain_on_data($ann, $data, int $max_neurons, int $neurons_between_reports, float $desired_error) : bool {}

/**
 * @param resource $ann
 * @param string $filename
 * @param int $max_neurons
 * @param int $neurons_between_reports
 * @param float $desired_error
 * @return bool
 */
function fann_cascadetrain_on_file($ann, string $filename, int $max_neurons, int $neurons_between_reports, float $desired_error) : bool {}

/**
 * @param resource $ann
 * @return bool
 */
function fann_clear_scaling_params($ann) : bool {}

/**
 * @param resource $ann
 * @return resource
 */
function fann_copy($ann) {}

/**
 * @param string $configuration_file
 * @return resource
 */
function fann_create_from_file(string $configuration_file) {}

/**
 * @param int $num_layers
 * @param int $num_neurons1
 * @param int $num_neurons2
 * @param int $__variadic
 * @return resource
 */
function fann_create_shortcut(int $num_layers, int $num_neurons1, int $num_neurons2, int ...$__variadic) {}

/**
 * @param int $num_layers
 * @param array $layers
 * @return resource
 */
function fann_create_shortcut_array(int $num_layers, array $layers) {}

/**
 * @param float $connection_rate
 * @param int $num_layers
 * @param int $num_neurons1
 * @param int $num_neurons2
 * @param int $__variadic
 * @return resource
 */
function fann_create_sparse(float $connection_rate, int $num_layers, int $num_neurons1, int $num_neurons2, int ...$__variadic) {}

/**
 * @param float $connection_rate
 * @param int $num_layers
 * @param array $layers
 * @return resource
 */
function fann_create_sparse_array(float $connection_rate, int $num_layers, array $layers) {}

/**
 * @param int $num_layers
 * @param int $num_neurons1
 * @param int $num_neurons2
 * @param int $__variadic
 * @return resource
 */
function fann_create_standard(int $num_layers, int $num_neurons1, int $num_neurons2, int ...$__variadic) {}

/**
 * @param int $num_layers
 * @param array $layers
 * @return resource
 */
function fann_create_standard_array(int $num_layers, array $layers) {}

/**
 * @param int $num_data
 * @param int $num_input
 * @param int $num_output
 * @return resource
 */
function fann_create_train(int $num_data, int $num_input, int $num_output) {}

/**
 * @param int $num_data
 * @param int $num_input
 * @param int $num_output
 * @param callable $user_function
 * @return resource
 */
function fann_create_train_from_callback(int $num_data, int $num_input, int $num_output, callable $user_function) {}

/**
 * @param resource $ann
 * @param array $input_vector
 * @return bool
 */
function fann_descale_input($ann, array $input_vector) : bool {}

/**
 * @param resource $ann
 * @param array $output_vector
 * @return bool
 */
function fann_descale_output($ann, array $output_vector) : bool {}

/**
 * @param resource $ann
 * @param resource $train_data
 * @return bool
 */
function fann_descale_train($ann, $train_data) : bool {}

/**
 * @param resource $ann
 * @return bool
 */
function fann_destroy($ann) : bool {}

/**
 * @param resource $train_data
 * @return bool
 */
function fann_destroy_train($train_data) : bool {}

/**
 * @param resource $data
 * @return resource
 */
function fann_duplicate_train_data($data) {}

/**
 * @param resource $ann
 * @param int $layer
 * @param int $neuron
 * @return int
 */
function fann_get_activation_function($ann, int $layer, int $neuron) : int {}

/**
 * @param resource $ann
 * @param int $layer
 * @param int $neuron
 * @return float
 */
function fann_get_activation_steepness($ann, int $layer, int $neuron) : float {}

/**
 * @param resource $ann
 * @return array
 */
function fann_get_bias_array($ann) : array {}

/**
 * @param resource $ann
 * @return int
 */
function fann_get_bit_fail($ann) : int {}

/**
 * @param resource $ann
 * @return float
 */
function fann_get_bit_fail_limit($ann) : float {}

/**
 * @param resource $ann
 * @return array
 */
function fann_get_cascade_activation_functions($ann) : array {}

/**
 * @param resource $ann
 * @return int
 */
function fann_get_cascade_activation_functions_count($ann) : int {}

/**
 * @param resource $ann
 * @return array
 */
function fann_get_cascade_activation_steepnesses($ann) : array {}

/**
 * @param resource $ann
 * @return int
 */
function fann_get_cascade_activation_steepnesses_count($ann) : int {}

/**
 * @param resource $ann
 * @return float
 */
function fann_get_cascade_candidate_change_fraction($ann) : float {}

/**
 * @param resource $ann
 * @return float
 */
function fann_get_cascade_candidate_limit($ann) : float {}

/**
 * @param resource $ann
 * @return int
 */
function fann_get_cascade_candidate_stagnation_epochs($ann) : int {}

/**
 * @param resource $ann
 * @return int
 */
function fann_get_cascade_max_cand_epochs($ann) : int {}

/**
 * @param resource $ann
 * @return int
 */
function fann_get_cascade_max_out_epochs($ann) : int {}

/**
 * @param resource $ann
 * @return int
 */
function fann_get_cascade_min_cand_epochs($ann) : int {}

/**
 * @param resource $ann
 * @return int
 */
function fann_get_cascade_min_out_epochs($ann) : int {}

/**
 * @param resource $ann
 * @return int
 */
function fann_get_cascade_num_candidate_groups($ann) : int {}

/**
 * @param resource $ann
 * @return int
 */
function fann_get_cascade_num_candidates($ann) : int {}

/**
 * @param resource $ann
 * @return float
 */
function fann_get_cascade_output_change_fraction($ann) : float {}

/**
 * @param resource $ann
 * @return int
 */
function fann_get_cascade_output_stagnation_epochs($ann) : int {}

/**
 * @param resource $ann
 * @return float
 */
function fann_get_cascade_weight_multiplier($ann) : float {}

/**
 * @param resource $ann
 * @return array
 */
function fann_get_connection_array($ann) : array {}

/**
 * @param resource $ann
 * @return float
 */
function fann_get_connection_rate($ann) : float {}

/**
 * @param resource $errdat
 * @return int
 */
function fann_get_errno($errdat) : int {}

/**
 * @param resource $errdat
 * @return string
 */
function fann_get_errstr($errdat) : string {}

/**
 * @param resource $ann
 * @return array
 */
function fann_get_layer_array($ann) : array {}

/**
 * @param resource $ann
 * @return float
 */
function fann_get_learning_momentum($ann) : float {}

/**
 * @param resource $ann
 * @return float
 */
function fann_get_learning_rate($ann) : float {}

/**
 * @param resource $ann
 * @return float
 */
function fann_get_MSE($ann) : float {}

/**
 * @param resource $ann
 * @return int
 */
function fann_get_network_type($ann) : int {}

/**
 * @param resource $ann
 * @return int
 */
function fann_get_num_input($ann) : int {}

/**
 * @param resource $ann
 * @return int
 */
function fann_get_num_layers($ann) : int {}

/**
 * @param resource $ann
 * @return int
 */
function fann_get_num_output($ann) : int {}

/**
 * @param resource $ann
 * @return float
 */
function fann_get_quickprop_decay($ann) : float {}

/**
 * @param resource $ann
 * @return float
 */
function fann_get_quickprop_mu($ann) : float {}

/**
 * @param resource $ann
 * @return float
 */
function fann_get_rprop_decrease_factor($ann) : float {}

/**
 * @param resource $ann
 * @return float
 */
function fann_get_rprop_delta_max($ann) : float {}

/**
 * @param resource $ann
 * @return float
 */
function fann_get_rprop_delta_min($ann) : float {}

/**
 * @param resource $ann
 * @return int
 */
function fann_get_rprop_delta_zero($ann) : int {}

/**
 * @param resource $ann
 * @return float
 */
function fann_get_rprop_increase_factor($ann) : float {}

/**
 * @param resource $ann
 * @return float
 */
function fann_get_sarprop_step_error_shift($ann) : float {}

/**
 * @param resource $ann
 * @return float
 */
function fann_get_sarprop_step_error_threshold_factor($ann) : float {}

/**
 * @param resource $ann
 * @return float
 */
function fann_get_sarprop_temperature($ann) : float {}

/**
 * @param resource $ann
 * @return float
 */
function fann_get_sarprop_weight_decay_shift($ann) : float {}

/**
 * @param resource $ann
 * @return int
 */
function fann_get_total_connections($ann) : int {}

/**
 * @param resource $ann
 * @return int
 */
function fann_get_total_neurons($ann) : int {}

/**
 * @param resource $ann
 * @return int
 */
function fann_get_train_error_function($ann) : int {}

/**
 * @param resource $ann
 * @return int
 */
function fann_get_train_stop_function($ann) : int {}

/**
 * @param resource $ann
 * @return int
 */
function fann_get_training_algorithm($ann) : int {}

/**
 * @param resource $ann
 * @param resource $train_data
 * @return bool
 */
function fann_init_weights($ann, $train_data) : bool {}

/**
 * @param resource $data
 * @return int
 */
function fann_length_train_data($data) : int {}

/**
 * @param resource $data1
 * @param resource $data2
 * @return resource
 */
function fann_merge_train_data($data1, $data2) {}

/**
 * @param resource $data
 * @return int
 */
function fann_num_input_train_data($data) : int {}

/**
 * @param resource $data
 * @return int
 */
function fann_num_output_train_data($data) : int {}

/**
 * @param resource $errdat
 * @return void
 */
function fann_print_error($errdat) {}

/**
 * @param resource $ann
 * @param float $min_weight
 * @param float $max_weight
 * @return bool
 */
function fann_randomize_weights($ann, float $min_weight, float $max_weight) : bool {}

/**
 * @param string $filename
 * @return resource
 */
function fann_read_train_from_file(string $filename) {}

/**
 * @param resource $errdat
 * @return void
 */
function fann_reset_errno($errdat) {}

/**
 * @param resource $errdat
 * @return void
 */
function fann_reset_errstr($errdat) {}

/**
 * @param string $ann
 * @return bool
 */
function fann_reset_MSE(string $ann) : bool {}

/**
 * @param resource $ann
 * @param array $input
 * @return array
 */
function fann_run($ann, array $input) : array {}

/**
 * @param resource $ann
 * @param string $configuration_file
 * @return bool
 */
function fann_save($ann, string $configuration_file) : bool {}

/**
 * @param resource $data
 * @param string $file_name
 * @return bool
 */
function fann_save_train($data, string $file_name) : bool {}

/**
 * @param resource $ann
 * @param array $input_vector
 * @return bool
 */
function fann_scale_input($ann, array $input_vector) : bool {}

/**
 * @param resource $train_data
 * @param float $new_min
 * @param float $new_max
 * @return bool
 */
function fann_scale_input_train_data($train_data, float $new_min, float $new_max) : bool {}

/**
 * @param resource $ann
 * @param array $output_vector
 * @return bool
 */
function fann_scale_output($ann, array $output_vector) : bool {}

/**
 * @param resource $train_data
 * @param float $new_min
 * @param float $new_max
 * @return bool
 */
function fann_scale_output_train_data($train_data, float $new_min, float $new_max) : bool {}

/**
 * @param resource $ann
 * @param resource $train_data
 * @return bool
 */
function fann_scale_train($ann, $train_data) : bool {}

/**
 * @param resource $train_data
 * @param float $new_min
 * @param float $new_max
 * @return bool
 */
function fann_scale_train_data($train_data, float $new_min, float $new_max) : bool {}

/**
 * @param resource $ann
 * @param int $activation_function
 * @param int $layer
 * @param int $neuron
 * @return bool
 */
function fann_set_activation_function($ann, int $activation_function, int $layer, int $neuron) : bool {}

/**
 * @param resource $ann
 * @param int $activation_function
 * @return bool
 */
function fann_set_activation_function_hidden($ann, int $activation_function) : bool {}

/**
 * @param resource $ann
 * @param int $activation_function
 * @param int $layer
 * @return bool
 */
function fann_set_activation_function_layer($ann, int $activation_function, int $layer) : bool {}

/**
 * @param resource $ann
 * @param int $activation_function
 * @return bool
 */
function fann_set_activation_function_output($ann, int $activation_function) : bool {}

/**
 * @param resource $ann
 * @param float $activation_steepness
 * @param int $layer
 * @param int $neuron
 * @return bool
 */
function fann_set_activation_steepness($ann, float $activation_steepness, int $layer, int $neuron) : bool {}

/**
 * @param resource $ann
 * @param float $activation_steepness
 * @return bool
 */
function fann_set_activation_steepness_hidden($ann, float $activation_steepness) : bool {}

/**
 * @param resource $ann
 * @param float $activation_steepness
 * @param int $layer
 * @return bool
 */
function fann_set_activation_steepness_layer($ann, float $activation_steepness, int $layer) : bool {}

/**
 * @param resource $ann
 * @param float $activation_steepness
 * @return bool
 */
function fann_set_activation_steepness_output($ann, float $activation_steepness) : bool {}

/**
 * @param resource $ann
 * @param float $bit_fail_limit
 * @return bool
 */
function fann_set_bit_fail_limit($ann, float $bit_fail_limit) : bool {}

/**
 * @param resource $ann
 * @param collable $callback
 * @return bool
 */
function fann_set_callback($ann, collable $callback) : bool {}

/**
 * @param resource $ann
 * @param array $cascade_activation_functions
 * @return bool
 */
function fann_set_cascade_activation_functions($ann, array $cascade_activation_functions) : bool {}

/**
 * @param resource $ann
 * @param array $cascade_activation_steepnesses_count
 * @return bool
 */
function fann_set_cascade_activation_steepnesses($ann, array $cascade_activation_steepnesses_count) : bool {}

/**
 * @param resource $ann
 * @param float $cascade_candidate_change_fraction
 * @return bool
 */
function fann_set_cascade_candidate_change_fraction($ann, float $cascade_candidate_change_fraction) : bool {}

/**
 * @param resource $ann
 * @param float $cascade_candidate_limit
 * @return bool
 */
function fann_set_cascade_candidate_limit($ann, float $cascade_candidate_limit) : bool {}

/**
 * @param resource $ann
 * @param int $cascade_candidate_stagnation_epochs
 * @return bool
 */
function fann_set_cascade_candidate_stagnation_epochs($ann, int $cascade_candidate_stagnation_epochs) : bool {}

/**
 * @param resource $ann
 * @param int $cascade_max_cand_epochs
 * @return bool
 */
function fann_set_cascade_max_cand_epochs($ann, int $cascade_max_cand_epochs) : bool {}

/**
 * @param resource $ann
 * @param int $cascade_max_out_epochs
 * @return bool
 */
function fann_set_cascade_max_out_epochs($ann, int $cascade_max_out_epochs) : bool {}

/**
 * @param resource $ann
 * @param int $cascade_min_cand_epochs
 * @return bool
 */
function fann_set_cascade_min_cand_epochs($ann, int $cascade_min_cand_epochs) : bool {}

/**
 * @param resource $ann
 * @param int $cascade_min_out_epochs
 * @return bool
 */
function fann_set_cascade_min_out_epochs($ann, int $cascade_min_out_epochs) : bool {}

/**
 * @param resource $ann
 * @param int $cascade_num_candidate_groups
 * @return bool
 */
function fann_set_cascade_num_candidate_groups($ann, int $cascade_num_candidate_groups) : bool {}

/**
 * @param resource $ann
 * @param float $cascade_output_change_fraction
 * @return bool
 */
function fann_set_cascade_output_change_fraction($ann, float $cascade_output_change_fraction) : bool {}

/**
 * @param resource $ann
 * @param int $cascade_output_stagnation_epochs
 * @return bool
 */
function fann_set_cascade_output_stagnation_epochs($ann, int $cascade_output_stagnation_epochs) : bool {}

/**
 * @param resource $ann
 * @param float $cascade_weight_multiplier
 * @return bool
 */
function fann_set_cascade_weight_multiplier($ann, float $cascade_weight_multiplier) : bool {}

/**
 * @param resource $errdat
 * @param string $log_file
 * @return void
 */
function fann_set_error_log($errdat, string $log_file) {}

/**
 * @param resource $ann
 * @param resource $train_data
 * @param float $new_input_min
 * @param float $new_input_max
 * @return bool
 */
function fann_set_input_scaling_params($ann, $train_data, float $new_input_min, float $new_input_max) : bool {}

/**
 * @param resource $ann
 * @param float $learning_momentum
 * @return bool
 */
function fann_set_learning_momentum($ann, float $learning_momentum) : bool {}

/**
 * @param resource $ann
 * @param float $learning_rate
 * @return bool
 */
function fann_set_learning_rate($ann, float $learning_rate) : bool {}

/**
 * @param resource $ann
 * @param resource $train_data
 * @param float $new_output_min
 * @param float $new_output_max
 * @return bool
 */
function fann_set_output_scaling_params($ann, $train_data, float $new_output_min, float $new_output_max) : bool {}

/**
 * @param resource $ann
 * @param float $quickprop_decay
 * @return bool
 */
function fann_set_quickprop_decay($ann, float $quickprop_decay) : bool {}

/**
 * @param resource $ann
 * @param float $quickprop_mu
 * @return bool
 */
function fann_set_quickprop_mu($ann, float $quickprop_mu) : bool {}

/**
 * @param resource $ann
 * @param float $rprop_decrease_factor
 * @return bool
 */
function fann_set_rprop_decrease_factor($ann, float $rprop_decrease_factor) : bool {}

/**
 * @param resource $ann
 * @param float $rprop_delta_max
 * @return bool
 */
function fann_set_rprop_delta_max($ann, float $rprop_delta_max) : bool {}

/**
 * @param resource $ann
 * @param float $rprop_delta_min
 * @return bool
 */
function fann_set_rprop_delta_min($ann, float $rprop_delta_min) : bool {}

/**
 * @param resource $ann
 * @param float $rprop_delta_zero
 * @return bool
 */
function fann_set_rprop_delta_zero($ann, float $rprop_delta_zero) : bool {}

/**
 * @param resource $ann
 * @param float $rprop_increase_factor
 * @return bool
 */
function fann_set_rprop_increase_factor($ann, float $rprop_increase_factor) : bool {}

/**
 * @param resource $ann
 * @param float $sarprop_step_error_shift
 * @return bool
 */
function fann_set_sarprop_step_error_shift($ann, float $sarprop_step_error_shift) : bool {}

/**
 * @param resource $ann
 * @param float $sarprop_step_error_threshold_factor
 * @return bool
 */
function fann_set_sarprop_step_error_threshold_factor($ann, float $sarprop_step_error_threshold_factor) : bool {}

/**
 * @param resource $ann
 * @param float $sarprop_temperature
 * @return bool
 */
function fann_set_sarprop_temperature($ann, float $sarprop_temperature) : bool {}

/**
 * @param resource $ann
 * @param float $sarprop_weight_decay_shift
 * @return bool
 */
function fann_set_sarprop_weight_decay_shift($ann, float $sarprop_weight_decay_shift) : bool {}

/**
 * @param resource $ann
 * @param resource $train_data
 * @param float $new_input_min
 * @param float $new_input_max
 * @param float $new_output_min
 * @param float $new_output_max
 * @return bool
 */
function fann_set_scaling_params($ann, $train_data, float $new_input_min, float $new_input_max, float $new_output_min, float $new_output_max) : bool {}

/**
 * @param resource $ann
 * @param int $error_function
 * @return bool
 */
function fann_set_train_error_function($ann, int $error_function) : bool {}

/**
 * @param resource $ann
 * @param int $stop_function
 * @return bool
 */
function fann_set_train_stop_function($ann, int $stop_function) : bool {}

/**
 * @param resource $ann
 * @param int $training_algorithm
 * @return bool
 */
function fann_set_training_algorithm($ann, int $training_algorithm) : bool {}

/**
 * @param resource $ann
 * @param int $from_neuron
 * @param int $to_neuron
 * @param float $weight
 * @return bool
 */
function fann_set_weight($ann, int $from_neuron, int $to_neuron, float $weight) : bool {}

/**
 * @param resource $ann
 * @param array $connections
 * @return bool
 */
function fann_set_weight_array($ann, array $connections) : bool {}

/**
 * @param resource $train_data
 * @return bool
 */
function fann_shuffle_train_data($train_data) : bool {}

/**
 * @param resource $data
 * @param int $pos
 * @param int $length
 * @return resource
 */
function fann_subset_train_data($data, int $pos, int $length) {}

/**
 * @param resource $ann
 * @param array $input
 * @param array $desired_output
 * @return array
 */
function fann_test($ann, array $input, array $desired_output) : array {}

/**
 * @param resource $ann
 * @param resource $data
 * @return float
 */
function fann_test_data($ann, $data) : float {}

/**
 * @param resource $ann
 * @param array $input
 * @param array $desired_output
 * @return bool
 */
function fann_train($ann, array $input, array $desired_output) : bool {}

/**
 * @param resource $ann
 * @param resource $data
 * @return float
 */
function fann_train_epoch($ann, $data) : float {}

/**
 * @param resource $ann
 * @param resource $data
 * @param int $max_epochs
 * @param int $epochs_between_reports
 * @param float $desired_error
 * @return bool
 */
function fann_train_on_data($ann, $data, int $max_epochs, int $epochs_between_reports, float $desired_error) : bool {}

/**
 * @param resource $ann
 * @param string $filename
 * @param int $max_epochs
 * @param int $epochs_between_reports
 * @param float $desired_error
 * @return bool
 */
function fann_train_on_file($ann, string $filename, int $max_epochs, int $epochs_between_reports, float $desired_error) : bool {}

class FANNConnection
{
    function __construct(int $from_neuron, int $to_neuron, float $weight) {}
    function getFromNeuron() : int {}
    function getToNeuron() : int {}
    function getWeight() {}
    function setWeight(float $weight) {}
}
