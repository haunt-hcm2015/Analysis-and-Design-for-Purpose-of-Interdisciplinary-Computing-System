# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Asset(models.Model):
    _inherit = 'asset.asset'
    _description = 'Asset Model'
    asset_insurance_id = fields.Many2one('governance.asset.insurance', string='Asset Insurance')
  