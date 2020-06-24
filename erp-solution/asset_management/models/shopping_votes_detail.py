# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class ShoppingVotesDetail(models.Model):
    _name = 'asset.shopping.votes.detail'
    _description = 'Shopping Votes Detail Model'
    shopping_person_id = fields.Many2one('hr.employee')
    tool_id = fields.Many2one('asset.tool')
    quantity = fields.Integer('Quantity')
    asset_image = fields.Image('Asset Image')
  