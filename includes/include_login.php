<div id="loginLink">
    <div id="tabs">
        <ul id="tabMenu">
  
        <li class="dropdown"><a href="#tab1">Login</a></li>
        <li class="dropdown"><a href="#tab2">Sign-Up</a></li>
        
        </ul>
    </div>


    <div id="tabContainer">
        <ul id="tabPanes">
            <li id="tab1">
                
                <p>

                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    
                        <div class="formcontainer">
                            
                            <div class="text">
                                <label for="Email">Email</label>

                                <input type="text" name="email" placeholder="Email" />
                            </div>
                            
                            <div class="text">
                                <label for="password">Password</label>
                                <input type="password" name="password" placeholder="Password" />
                            </div>
                            
                            <div class="text">
                                <br>

                                <input type="checkbox" name="rememberme" id="rememberme"> Remember Me
                                
                            </div>
                        </div>            
                        
                        <center>
                        
                            <input id="btnLogin" type="submit" name="btnLogin" value="Sign in" />
                        </center>

                </form>
                    
                    
                </p>

            </li>
            
            <li id="tab2">
                
                <p>
                    
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="formcontainer">
                            <div class="text">
                                <label for="username">Desired Username</label>
                                <input type="text" name="username" placeholder="Full name" />
                            </div>

                            <div class="text">
                                <label for="email">Email</label>
                                <input type="email" name="email" placeholder="Email" />
                            </div>

                            
                            <div class="text">
                                <label for="despassword">Desired Password</label>
                                <input type="password" name="password" placeholder="Password" />
                            </div>
                            <!--<div class="text">
                                <label for="password">Confirm Password</label>
                                <input type="text" name="confpassword" id="confpassword" alt="Please ensure this matches the password above">
                            </div>-->

                        </div>
                        
                        
                        <center>
                            <input id="btnLogin" type="submit" name="btnSignup" value="Sign up" />
                        </center>
                    </form>
                </p>
            </li>
        </ul>
    </div>

</div>