# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Report(models.Model):
    _name = 'asset.report'
    _description = 'Report Model'
    report_number = fields.Char()
    name = fields.Char('Report Name')
    report_type_id = fields.Many2one('asset.report.type')
class AssetReportType(models.Model):
    _name = 'asset.report.type'
    _description = 'Asset Report Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char('Type Name')
  