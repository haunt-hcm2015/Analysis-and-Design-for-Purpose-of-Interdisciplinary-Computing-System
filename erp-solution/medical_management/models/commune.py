# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Commune(models.Model):
    _inherit = 'civil.status.commune'
    _description = 'Commune model'