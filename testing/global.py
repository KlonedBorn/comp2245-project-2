# Copyright 2022 Kyle King
# 
# Licensed under the Apache License, Version 2.0 (the "License");
# you may not use this file except in compliance with the License.
# You may obtain a copy of the License at
# 
#     http://www.apache.org/licenses/LICENSE-2.0
# 
# Unless required by applicable law or agreed to in writing, software
# distributed under the License is distributed on an "AS IS" BASIS,
# WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
# See the License for the specific language governing permissions and
# limitations under the License.

from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.firefox.service import Service
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.support.wait import WebDriverWait
root_url = "https://localhost/comp2245-final-project"

def init_driver():
    browser_options = webdriver.FirefoxOptions()
    # browser_options.add_argument("--headless")
    browser_options.binary_location = "C:\Program Files\Mozilla Firefox\\firefox.exe"
    browser_service = Service(executable_path='.venv\Include\geckodriver.exe')
    browser = webdriver.Firefox(options=browser_options,service=browser_service)
    return browser
    
def login_user(browser :webdriver.Firefox ,email="connor-alden@facade.com",password = "FinalC0unt"):
    login_screen = root_url + "/login.html"
    browser.get(login_screen)
    if_email = browser.find_element(By.ID,'email')
    if_email.send_keys(email)
    if_pswd = browser.find_element(By.ID,'password')
    if_pswd.send_keys(password)
    login_btn = browser.find_element(By.ID,'loginbtn')
    login_btn.click()