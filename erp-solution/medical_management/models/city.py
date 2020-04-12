# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class City(models.Model):
    _inherit = 'civil.status.city'
    _description = 'City Model'