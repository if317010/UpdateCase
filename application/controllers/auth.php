<?php
class Auth extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('model_auth','auth');
    }

    /*
     * Dashboard Page
     */
    public function index()
    {
        $this->is_logged();
        $layout = array(
            'title' => 'Form Update Case',
            'content'   => 'welcome'
        );
        $this->load->view('master_template', $layout);
    }

    /*
     * Signin Page
     */
    public function signin()
    {
        $this->is_logged();
        $layout = array(
            'title' => 'Login User',
            'content'   => 'auth'
        );
        $this->load->view('master_template', $layout);
    }
    public function signin_process()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run()){
            $username   = $this->input->input_stream('username', TRUE);
            $password   = $this->input->input_stream('password', TRUE);
            # Data Untuk Login
            $datasignin = array(
                'username'  => $username,
                'password'  => ($password)
            );
            $signprocess    = $this->auth->signin($datasignin);
            if ($signprocess ){
                if ($signprocess->user_satatus == 1) {
                    $datasession    = array(
                        'id'   => $signprocess->id,
                        'username'  => $username,
                        'is_logged' => true,
                        'user_level' => $signprocess->user_level
                    );
                    $this->session->set_userdata($datasession);
                    redirect(base_url('user/dashboard'));
                }else {
                    $this->session->set_flashdata('no_user','Account anda tidak aktiv, hubungi Admin');
                    redirect(base_url('auth/signin'));
                }
            }else{
                $this->session->set_flashdata('no_user','Username atau Password salah');
                redirect(base_url('auth/signin'));
            }
        }else{
            $layout = array(
                'title' => 'Login User',
                'content'   => 'auth'
            );
            $this->load->view('master_template', $layout);
        }
    }

    /*
     * Check is Logged
     */
    protected function is_logged()
    {
        if ($this->session->is_logged){
            redirect(base_url('user/dashboard'));
        }
    }
    /*
     * Logout
     */
    public function signout()
    {
        $this->session->sess_destroy();

        redirect(base_url());
    }
    /*
     * Not Found Page
     */
    public function notfound()
    {
        $layout = array(
            'title' => '404 Tidak ditemukan',
            'content'   => 'notfound'
        );
        $this->load->view('master_template', $layout);
    }

    /*
     * Blob Image Generator
     */
    public function imageGenerator(){
        $data = "iVBORw0KGgoAAAANSUhEUgAAARMAAAC3CAMAAAAGjUrGAAAAb1BMVEV8v9AAOV+AxNQAL1gAMloANl0AMVptr8OBxdUALVcAK1Z0tsg\/eJMAOWAANFtZlqxhoLUMQGQoV3YaTG1dm7JCe5RKhJ1mprowZ4N5vM5RjaQgUXJUkKdzs8UVRGcAJ1MzZIA5b4spXn0iVnYAIU9dHhvIAAALhElEQVR4nO1c6ZqjOg4Fg9nXSgUCWYok8\/7POCYL4GObVDVU+s5cnT\/9ddl4OZZkWZZjWQQCgUAgEAgEAoFAIBAIBAKBQCAQCAQCgUAgEAgEAoFAIBAIBAKBQCAQCAQCgUAg\/DUw6+j7\/lH8O1tLxpvGpvT9R+U\/ReAn+zSMQntfHTUtHosH8hGHqjqs0vcMmmKCR79VVbXDEP1J+ecwrsRfo\/PEdbndg3u8Ukhh1Zd3hzPC88LutwUl\/nK9J9xHv+6kX5ZEQ7k3jMsN6xX6\/nDsEeEZp8paz9Yg+3VOmlTb727gZOvqKrjLOWE7R2oy3MJcDZy4Cnlr4yUnlZaTdLHusE8HmvSAZxMnyf8tJ9aVY6egFP9rnNiLOfFDhWcvlmqYOEEdWx1\/aE8Wc8JaR2kzzJlcJXIzDSfqDrUyGi\/T9DvhJAldFPJVOElUrlECPnfn3cbDRXsDJ7d+Zzg5nM+XVGVlMSeduhRjr89KLLBa5O73Oen7ZQc3NY5O+KzBca9MYDEnu29woq34Bk56BGhIcXTNe+RE542xHIzxmzixjqC1Gex3qvYv5uSssSfaXdaHik7+Hk6aPZ8dHctxl1jMSaVutJ5WAo5Q612csG6eE6tAb2IxJ5+Kf2KHha5mXP4dTgLQboWTY7QyJ1asbLI2b7QVT\/J6vU1OQLvfwInq2\/OLtl6z+Ttygjb0DZyoh4bwoJ3sP5eTte2J2E9QedJYW+8fy0mMyr+cE\/YBdt0QF\/lXcXKQ93cMnzzxb+IENll+NUx1jhMWBFYcW0HwvaC5OKYEQSMgvnj5yaqcDD2\/6DiQTjKe3sLOcMKsYnvZlAKnS1I0wYspBqw+JJfNqbx9se+2uR\/M0bIaJ33P7fnR82lzSQ41M\/XMCsmV1TonlpETdjx7jsttYZQ4566TnXXXIUNfcXv1HO9e\/\/aF+MRJk9r8zUqcMCu\/yD1nYty7T8OVFitHK+ueTeus56TZRnhujSrj9Oou8rgaPeNu9GFkZRVOWJxwRxN\/ysK0inU9T12UyKiMWk6Oe\/VoYDsXrawxvws1cbMHLeH5NzmpXG38tIdnt7puR0+Q743mQMdJXGon6X1oSGEt14dPn+1d9Vq7nBPmX9UA6wjuXDTqHgz+vWOysKLlvXLeYRvDunuqjxOcn+Pi\/e2eJpDq6klZzAkruFE8H02WquaOLkpmsrBiUh\/ISZAY6Y8+oZMgeSoZv1QCySUNMaro6uJ7izkRJ39dIFsC5yopzWPA2qijkRP\/QYmuyxICP9OQRBv0gdSgPuPyKUyuwAmrv2D+XlrainnJjkq\/j7jNnG+qcPLZBzYyr9ycUk+hBe5DrM2kRvTQrKCAkAzfa\/rFQ+oPOcGwj3vN\/SauK4j3871yTf5QHsPxT8tJVomWsnMdN43fKraWXyRjXUhaFj7SJVgNVjcs1DVZxgnbyV97yd0hCXwMB21xdznedNsQOdFzwjc2Pz3UkMVggO3UnVomkH++ebYJeqHT3UWcsE9ZSfh1KKlhGbmyhd\/m5M1ddyInNk9Df6gfY2DHmdqG4CJ9mw7pEDEou6P2u0xOIGLmjoKoxO9wr7xX0AdiTZxIGzeuuMwvcGIPaTPBydYXrMMJg\/i1ZDX8TP4wBTN7Nyj413lO+Gla7IOgSAbFyAluKl6rOgpLOMH49vRGgoEMKdcVfq93G7N3ouEErpVLNOQTThhsu0OMBnMWNAGtJZzEjlzmThUB0xKUXS8WU4K94hUnspzjNQw\/TZfkIMkwL5\/k44UVvypDWMAJhsvkQz8roNRBB1gY2flsLGXfKSWpUpJBpOJYkqLR1ihZUptVOYE7bn6SWq\/hiI6KG4hlnr8BVjiRN24l\/i9xIgmKexqKFE6yVTmBElAEdOfQE+iN3XyEFTkBqWIHcJdlMQpaV0wtTYWbNz0AIyepuyYn6CDAkANw2+yN3HDfszO3FaucbH\/CiTiwnzd9dOt0mTL\/HU62f8qJIoSwswR43edBz8LYzSeWKpzIHSgXzyVuYszyBWIpNPwdTv74DKgk4oHBQA8BA2rCCKfZjzhBTcPrfYUTZbL96bj4TU7Q7MOQlTQjB45btfcisXRFTvqcLL\/Iq6S7gEqvywnm1oSfLziBKfVH1HdwIlSnbs+nKAod1824cnRckRPFXmBCp3IeaRVO3iAnLD50aeQN6\/O7nKC9QE5Qt1RO+LwFWM4JY0XHnVFe3dDeX39RdxZz4qcvrOJiTljxMQqIzcPTtoit37Sxyzl5uVNs5jmp5zlhTTeNUGb2oQ94\/epevJyTzLVnKXmVVzAvJ6xvfzKxj+Z+s\/pXOcF9CTlh1dV8t7OYE5j7EALUcyK96VtxL37ln4R4b2C8Y1+BE1bL4x6uU7ScsG23uw7nDOQEc4ZnOMFjKeRMqJz89IXYEk4a2RZl3VNDtJwEGzcLBzFWOME4doy38gMnmE2Mvj36L9Er13tFTlgFqVDDp3pOhB3wvs+JOe8RzT4cWwOYkV3+kJIlnDTgwY+HTT0n3SJOJq4nlOCnGC6FiBBj8fFozaUzveBEEdRyEjgCuvhxLDJwMp66UetfcZLykXG4dYKsCV8eFYQShIOZRVH0tdEnqNzwIrd8Jn6ivlEbrhu\/ISeYW\/5STiZSqHQsfVjDiKWrnOYS3fvlHjfG2o4vOFFyj8cQIPgJ6XjlpudkL+kOfM0\/wIVBpZ0kbtYoQtK1KYRX+EnaFcbp8FC9YbnDB1YxpoSHTNcowrY3brQ4ITe+xwTH+zTUWbxxUQR0uruczEUK2dPIJOuk2Xiae2xLE8iDzDdl4hOLYC4K0K3qObHs6dXqEaacuhANwyay3TAwfIkjBanx8c00MbiWJ5t96CjRPQib2h5W445on5qnY4acDFLKCrgvvklXr+fh0wwHik2QF4PFyrjSyTW2vLWk7ph7g3xll4mYKF6\/kg\/GAqtR3z5lV\/\/hhfdxItjX+rFf\/OZerNw0u7vm9qMcuTIftw1uslP28tL3q3nr6yaxdcv4FU00PhLeU143D69cnfgwKR+jFBMxwbdltoMnobbbfZSavEHu7btOVP7sur0u0fJW7vemRp36ZpsfEl3SZJm3wi\/lvbDW3e5S6tLDvPRj1wkTfzZ0bDubrkvus4PTvLe7rRNT8k+8qfTFuML4vJgloe7ts93bcR4mjOURhsue4FmvpMrzylsvjnPL81NadvpUmNtBr\/7KTJloPItyxvauqWOxHpuHTuOV8Wlb1HV+hi+lTUfxO1RODE\/gn5XVR4oj7ncB+kf297Fo3iPaD3uHrrkEYYR174DHhvdPKceEB9dxPQcTchx\/Oml806Y+zFzMCduaMnajHB3syYRW4aTPuDQvyROYNIanQ8yRXc6Jyvuzq23AWs3M74GMdTixgso8vjsyu56fcuphvs5yTlitVXy36u3aRWneubvvK3EiXKvyRQa3jy6ZD7k8+Ap9BU4EKbbSiFfe\/bJ4D5rlPKJwa3EifJgzvpSYzCDT5Nuz7XROPFPck+TLcZwwUhCKP3\/1+46+vC92ovo5rF00zSfnjrcdfL7piNMser5GqP\/jYMNfQ8NffWp7ZB5YKCUJsHoXqkm8YuMM063+2LuLJmNVc5mLQ1F8Fv0F+EDX7T\/ij6JI\/Gcof2pdcysXxZ\/teAT2k1IM1nOF1Q+da9tM3Eb\/zMP+J7M8Ub4bdNtv+xZuTTVqw4LsPMeObz8zdxtYnsPKxu01nLzf6dP+Ha\/LTT9JF1Ric+J9tWivqJZ1v+3Wfff8u6Ecf0COBXFxaJPtIa8tCP4y5ueHKmnzmgXmBvDvxl+o0xaIlovqfD31vkdZbi7nmXdefXXrsNuLatv6xcu1xTD\/0t5bfhvw\/h4wjl+9Bxwrv4jcEwgEAoFAIBAIBAKBQCAQCAQCgUAgEAgEAoFAIBAIBAKBQCAQCAQCgUAgEAgEAoFAIBAIBMK\/Cf8Fi0C\/iRO\/xVUAAAAASUVORK5CYII=";
        $data = base64_decode($data);

        $im = imagecreatefromstring($data);
        if ($im !== false) {
            header('Content-Type: image/png');
            imagepng($im);
            imagedestroy($im);
        }
        else {
            echo 'An error occurred.';
        }
    }

}
?>
