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
from selenium.webdriver.support.ui import Select
import random

root_url = "https://localhost/comp2245-final-project"
is_logged_in = False

class FormItem:
    def __init__(self,type:str,by:By,val:str,value):
        self.type = type
        self.by = by
        self.val = val
        self.value = value

def init_driver():
    browser_options = webdriver.FirefoxOptions()
    browser_options.add_argument("--no-sandbox")
    browser_options.binary_location = "C:\Program Files\Mozilla Firefox\\firefox.exe"
    browser_service = Service(executable_path='.venv\Include\geckodriver.exe')
    browser = webdriver.Firefox(options=browser_options,service=browser_service)
    return browser
    
def login_user(browser:webdriver.Firefox ,email="connor-alden@facade.com",password = "FinalC0unt"):
    login_screen = root_url + "/login.html"
    browser.get(login_screen)
    if_email = browser.find_element(By.ID,'email')
    if_email.send_keys(email)
    if_pswd = browser.find_element(By.ID,'password')
    if_pswd.send_keys(password)
    login_btn = browser.find_element(By.ID,'loginbtn')
    login_btn.click()
    return True

def fill_form(url:str,browser:webdriver.Firefox,fields:list[FormItem]):
    browser.get(url)
    for field in fields:
        match field.type:
            case 'select':
                elem = browser.find_element(field.by,field.val)
                slct = Select(elem)
                slct.select_by_index(field.value)
            case 'input':
                elem = browser.find_element(field.by,field.val)
                elem.send_keys(field.value)



fp_names = open('./testing/names.txt','r').readlines()
fp_emails = open('./testing/emails.txt','r').readlines()
fp_phnumbers = open('./testing/phone_numbers.txt','r').readlines()
fp_company = open('./testing/companys.txt','r').readlines()


if __name__ == "__main__":
    browser = init_driver()
    is_logged_in=login_user(browser)
    if(is_logged_in == True):
        fill_form(root_url + "/addcontacts.html",browser,[
            FormItem('select',By.ID,'title',random.randint(0,2)),
            FormItem('input',By.ID,'firstname',fp_names[random.randint(0,len(fp_names)-1)]),
            FormItem('input',By.ID,'lastname',fp_names[random.randint(0,len(fp_names)-1)]),
            FormItem('input',By.ID,'email',fp_emails[random.randint(0,len(fp_emails)-1)]),
            FormItem('input',By.ID,'telephone',fp_phnumbers[random.randint(0,len(fp_phnumbers)-1)]),
            FormItem('input',By.ID,'company',fp_company[random.randint(0,len(fp_company)-1)]),
            FormItem('select',By.ID,'type',random.randint(0,1))
        ])
    browser.close()