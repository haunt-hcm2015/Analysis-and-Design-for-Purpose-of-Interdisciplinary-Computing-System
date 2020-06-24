# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class AssetTrademark(models.Model):
    _name = 'asset.trademark'
    _description = 'Asset Trademark Model'
    trademark_number = fields.Char('Trademark Number')
    name = fields.Char('Trademark Name')
    owner_id = fields.Many2one('res.partner', string='Owner')
    country = fields.Many2one('country')
    date_of_application = fields.Date()
    validity = fields.Date()
    issued_date = fields.Date('Issued the Date')
    picture = fields.Image('Picture of Trademark Certificate')


  