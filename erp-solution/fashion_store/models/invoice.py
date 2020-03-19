# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Invoice(models.Model):
    _name = 'store.invoice'
    _description = 'Invoice model'