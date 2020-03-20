# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Account(models.Model):
    _name = 'financial.account'
    _description = 'Accounting Model'
class AccountType(models.Model):
    _name = 'financial.account.type'
    _description = 'Accounting Type Model'