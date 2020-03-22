# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Patents(models.Model):
    _name = 'asset.patents'
    _description = 'Asset Patents Model'
    patent_number = fields.Char('Patent Number')
    name = fields.Char('Patent Name')
    author_ids = fields.Many2many('citizen')
    owner_id = fields.Many2one('res.partner', string='Owner')
    patent_type_id = fields.Many2one('asset.copyright.type')
    country = fields.Many2one('country')
    date_of_application = fields.Date()
    validity = fields.Date()
    issued_date = fields.Date('Issued the Date')
    picture = fields.Image('Picture of Patent Certificate')
class AssetPatentType(models.Model):
    _name = 'asset.patent.type'
    _description = 'Asset Copyright Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char('Type Name')
  