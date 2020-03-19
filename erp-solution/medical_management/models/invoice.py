# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Invoice(models.Model):
    _name = 'medical.invoice'
    _description = 'Medicine invoice model'